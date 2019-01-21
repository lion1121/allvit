<?php

namespace App;

<<<<<<< HEAD
=======
use App\Helpers\Parsers\XmlParser;
>>>>>>> ae980e1c1e931b4216aaf7f038895e1eae1ef722
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use \Mavsan\LaProtocol\Interfaces\Import as Import;

class ExportCatalog extends Model implements Import
{
    //
    public function import($fileName){
<<<<<<< HEAD
=======
        if ($fileName){
            $parser = new XmlParser($fileName);
            Log::debug($fileName);
            $parser->read();
            $parser->parse();
            $parser->writeProducts();
        }
>>>>>>> ae980e1c1e931b4216aaf7f038895e1eae1ef722
        return self::answerSuccess;
    }

    public function getAnswerDetail(){
        return "Обработано 90 товаров \n";
    }
}
