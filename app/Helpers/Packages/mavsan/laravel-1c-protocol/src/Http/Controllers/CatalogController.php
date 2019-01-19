<?php
/**
 * ProtocolController.php
 * Date: 16.05.2017
 * Time: 16:09
 * Author: Maksim Klimenko
 * Email: mavsan@gmail.com
 */

namespace Mavsan\LaProtocol\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Mavsan\LaProtocol\Http\Controllers\Traits\ImportsCatalog;
use Mavsan\LaProtocol\Http\Controllers\Traits\SharesSale;
use Mavsan\LaProtocol\Model\FileName;
use Illuminate\Http\Request;


class CatalogController extends BaseController
{
    /** @var  Request */
    protected $request;
    protected $stepCheckAuth = 'checkauth';
    protected $stepInit = 'init';
    protected $stepFile = 'file';
    protected $stepImport = 'import';

    protected $stepQuery = 'query';
    protected $stepSuccess = 'success';
    
    use SharesSale;
    use ImportsCatalog;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function defaultType() {
        return 'sale';
    }

    public function catalogIn()
    {
        $type = $this->request->get('type');
        $mode = $this->request->get('mode');

        if (!$type)
            $type = $this -> defaultType();

        if (config('protocolExchange1C.logCommandsOf1C', false)) {
            \Log::debug('Command from 1C type: '.$type.'; mode: '.$mode);
        }

        if ($type != 'catalog' && $type != 'sale') {
            return $this -> checkAuth();
        }

        if (! $this->userLogin()) {
            return $this->failure('wrong username or password');
        }

        switch ($mode) {
            case $this->stepCheckAuth:
                return $this->checkAuth();
                break;

            case $this->stepInit:
                return $this->init();
                break;

            case $this->stepFile:
                return $this->getFile();
                break;

            case $this->stepImport:
                try {
                    return $this->import();
                } catch (\Exception $e) {
                    return $this -> failure($e -> getMessage());
                }
                break;

            case $this -> stepQuery:
                return $this -> processQuery();
                break;

            case $this -> stepSuccess:
                $date = date('Y-m-d H:i:s');
                Log::info("[$date][1C] Successful orders export to 1C");
                return '';


        }

        return $this->failure();
    }

    /**
     * Сообщение о ошибке
     *
     * @param string $details - детали, строки должны быть разделены /n
     *
     * @return string
     */
    protected function failure($details = '')
    {
        $return = "failure".(empty($details) ? '' : "\n$details");

        return $this->answer($return);
    }

    /**
     * Ответ серверу
     *
     * @param $answer
     *
     * @return string
     */
    protected function answer($answer)
    {
        return iconv('UTF-8', 'windows-1251', $answer);
    }

    /**
     * Попытка входа
     * @return bool
     */
    protected function userLogin()
    {
        if (Auth::getUser() === null) {
            $user = \Request::getUser();
            $pass = \Request::getPassword();

            $attempt = Auth::attempt(['email' => $user, 'password' => $pass]);

            if (! $attempt) {
                return false;
            }

            $gates = config('protocolExchange1C.gates', []);
            if (! is_array($gates)) {
                $gates = [$gates];
            }

            foreach ($gates as $gate) {
                if (\Gate::has($gate) && \Gate::denies($gate, Auth::user())) {
                    Auth::logout();

                    return false;
                }
            }

            return true;
        }

        return true;
    }

    /**
     * Авторизация 1с в системе
     */
    protected function checkAuth()
    {
        $cookieName = config('session.cookie');
        $cookieID = Session::getId();

        return $this->answer("success\n$cookieName\n$cookieID");
    }

    /**
     * Инициализация соединения
     * @return string
     */
    protected function init()
    {
        $zip = "zip=".($this->canUseZip() ? 'yes' : 'no');

//        return $this->answer("$zip\nfile_limit=".config('protocolExchange1C.maxFileSize'));
        echo 'zip='.$zip."\n";
        echo "file_limit=0\n";
        exit;
    }

    /**
     * Можно ли использовать ZIP
     * @return bool
     */
    protected function canUseZip()
    {
        return function_exists("zip_open");
    }

    /**
     * Получение файла(ов)
     * @return string
     */
    protected function getFile()
    {
        $modelFileName = new FileName($this->request->input('filename'));
        $fileName = $modelFileName->getFileName();

        if (empty($fileName)) {
            return $this->failure('Mode: '.$this->stepFile
                                  .', parameter filename is empty');
        }

        $fullPath = $this->getFullPathToFile($fileName, true);

        $fData = $this->getFileGetData();

        if (empty($fData)) {
            return $this->failure('Mode: '.$this->stepFile
                                  .', input data is empty.');
        }

        if ($file = fopen($fullPath, 'ab')) {

            $dataLen = mb_strlen($fData, 'latin1');
            $result = fwrite($file, $fData);

            if ($result === $dataLen) {
                // файлы, требующие распаковки
                $files = [];

                if ($this->canUseZip()) {
                    $files = session('inputZipped', []);
                    $files[$fileName] = $fullPath;
                }

                session(['inputZipped' => $files]);

                return $this->success();
            }

            $this->failure('Mode: '.$this->stepFile
                           .', can`t wrote data to file: '.$fullPath);

        } else {
            return $this->failure('Mode: '.$this->stepFile.', cant open file: '
                                  .$fullPath.' to write.');
        }

        return $this->failure('Mode: '.$this->stepFile.', unexpected error.');
    }

    /**
     * Формирование полного пути к файлу
     *
     * @param string $fileName
     *
     * @param bool   $clearOld
     *
     * @return string
     */
    protected function getFullPathToFile($fileName, $clearOld = false)
    {
        $workDirName = $this->checkInputPath();

        if ($clearOld) {
            $this->clearInputPath($workDirName);
        }

        $path = config('protocolExchange1C.inputPath');

        return $path.'/'.$workDirName.'/'.$fileName;
    }

    /**
     * Формирование имени папки, куда будут сохранятся принимаемые файлы
     * @return string
     */
    protected function checkInputPath()
    {
        $folderName = session('inputFolderName');
        if (is_null($folderName)) {
//            $folderName = date('Y-m-d_H:i');
            $folderName = 'temp';
            session(['inputFolderName' => $folderName]) ;
            $fullPath = storage_path('1cExchange').'/'.$folderName.'/';

            if (! File::isDirectory($fullPath)) {
                File::makeDirectory($fullPath, 0755, true);
            }
        }

        return $folderName;

    }

    /**
     * Очистка папки, где хранятся входящие файлы от предыдущих принятых файлов
     *
     * @param $currentFolder
     */
    protected function clearInputPath($currentFolder)
    {
        $storePath = config('protocolExchange1C.inputPath');

        foreach (File::directories($storePath) as $path) {
            if (File::basename($path) != $currentFolder) {
                File::deleteDirectory($path);
            }
        }
    }

    /**
     * получение контента файла
     *
     * @return string
     */
    protected function getFileGetData()
    {
        /*if (function_exists("file_get_contents")) {
            $fData = file_get_contents("php://input");
        } elseif (isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
            $fData = &$GLOBALS["HTTP_RAW_POST_DATA"];
        } else {
            $fData = '';
        }

        if (\App::environment('testing')) {
            $fData = \Request::getContent();
        }

        return $fData;
        */

        return \Request::getContent();
    }

    /**
     * Отправка ответа, что все в порядке
     * @return string
     */
    protected function success()
    {
        return $this->answer("success\n");
    }

}
