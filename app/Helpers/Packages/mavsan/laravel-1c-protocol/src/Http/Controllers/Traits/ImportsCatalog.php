<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 9:09 PM
 */

namespace Mavsan\LaProtocol\Http\Controllers\Traits;

use Chumper\Zipper\Facades\Zipper;
use Exception;
use Illuminate\Support\Facades\File;
use Mavsan\LaProtocol\Interfaces\Import;
use Mavsan\LaProtocol\Model\FileName;


trait ImportsCatalog
{

    /**
     * Импорт данных
     * @return string
     * @throws Exception
     */
    protected function import()
    {
        $unZip = $this->unzipIfNeed();

        if ($unZip == 'more') {
            return $this->answer("progress\n");
        } elseif (! empty($unZip)) {
            return $this->failure('Mode: '.$this->stepImport.' '.$unZip);
        }

        // проверка валидности имени файла
        $fileName =
            $this->importGetFileName($this->request->get('filename'));
        if (empty($fileName)) {
            return $this->failure('Mode: '.$this->stepImport
                .' wrong file name: '
                .$this->request->get('filename'));
        }

        $modelCLass = config('protocolExchange1C.catalogWorkModel');
        // проверка модели
        if (empty($modelCLass)) {
            return $this->failure('Mode: '.$this->stepImport
                .', please set model to import data in catalogWorkModel key.');
        }

        /** @var Import $model */
        $model = \App::make($modelCLass);
        if (! $model instanceof Import) {
            return $this->failure('Mode: '.$this->stepImport.' model '
                .$modelCLass
                .' must implement \Mavsan\LaProtocol\Interfaces\Import');
        }

        try {
            $fullPath = $this->getFullPathToFile($fileName);

            if (! File::isFile($fullPath)) {
                return $this->failure('Mode: '.$this->stepImport.', file '
                    .$fullPath
                    .' not exists');
            }

            $ret = $model->import($fullPath);

            $retData = explode("\n", $ret);
            $valid = [
                Import::answerSuccess,
                Import::answerProgress,
                Import::answerFailure,
            ];

            if (! in_array($retData[0], $valid)) {
                return $this->failure('Mode: '.$this->stepImport.' model '
                    .$modelCLass
                    .' model return wrong answer');
            }

            $log = $model->getAnswerDetail();

            return $ret."\n".$log;

        } catch (\Exception $e) {
            return $this->failure('Mode: '.$this->stepImport
                .", exception: {$e->getMessage()}\n"
                ."{$e->getFile()}, {$e->getLine()}\n"
                ."{$e->getTraceAsString()}");
        }
    }

    /**
     * Распаковка файлов, если требуется
     *
     * @return string
     * @throws Exception
     */
    protected function unzipIfNeed()
    {
        $files = session('inputZipped', []);

        if (empty($files)) {
            return '';
        }

        $file = array_shift($files);

        session(['inputZipped' => $files]);

        /** @var \Chumper\Zipper\Zipper $zip */
        try {
            $zip = Zipper::make($file);
            if ($zip->getStatus() === false) {
                return 'Error opening zipped: '.$file;
            }
        } catch (Exception $e) {
            return 'Error opening zipped: '.$e->getMessage();
        }

        $path =
            config('protocolExchange1C.inputPath').'/'.$this->checkInputPath();

        $zip->extractTo($path);

        File::delete($file);

        return 'more';
    }

    /**
     * Получение и очистка имени файла. Все, что тут сделано - взято из 1С
     * Битрикс
     *
     * В случае, если имя переданное файла не проходит фильтры - будет
     * возвращена пустая строка
     *
     * @param string $fileName
     *
     * @return string
     */
    protected function importGetFileName($fileName)
    {
        $modeFileName = new FileName($fileName);
        if ($modeFileName->hasScriptExtension()
            || $modeFileName->isFileUnsafe()
            || ! $modeFileName->validatePathString("/$fileName")
        ) {
            return '';
        }

        return $modeFileName->getFileName();
    }
}
