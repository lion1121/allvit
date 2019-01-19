<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use \Mavsan\LaProtocol\Interfaces\Import as Import;

class ExportCatalog extends Model implements Import
{
    //
    public function import($fileName){
        return self::answerSuccess;
    }

    public function getAnswerDetail(){
        return "Обработано 90 товаров \n";
    }
}
