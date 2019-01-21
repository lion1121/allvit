<?php

namespace App;



use App\Helpers\Parsers\XmlParser;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use \Mavsan\LaProtocol\Interfaces\Import as Import;

class ExportCatalog extends Model implements Import
{
    //
    public function import($fileName){

        if ($fileName){
            $parser = new XmlParser($fileName);
            Log::debug($fileName);
            $parser->read();
            $parser->parse();
            $parser->writeProducts();
        }
        return self::answerSuccess;
    }

    public function getAnswerDetail(){
        return "Обработано 90 товаров \n";
    }
}
