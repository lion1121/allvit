<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/24/2018
 * Time: 9:08 PM
 */

namespace Mavsan\LaProtocol\Http\Controllers\Traits;


use CommerceML\Client;
use Mavsan\LaProtocol\Interfaces\ExportOrders;
use Mockery\Exception;

trait SharesSale
{
    protected function processQuery() {
        $modelCLass = config('protocolExchange1C.saleShareModel');
        // проверка модели
        if (empty($modelCLass)) {
            return $this->failure('Mode: '.$this->stepQuery
                .', please set model to import data in catalogWorkModel key.');
        }

        try {
            /** @var ExportOrders $model */
            $model = \App::make($modelCLass);
            if (! $model instanceof ExportOrders) {
                return $this->failure('Mode: '.$this->stepQuery.' model '
                    .$modelCLass
                    .' must implement \Mavsan\LaProtocol\Interfaces\ExportOrders');
            }
            return Client::toString($model -> exportAllOrders());
        } catch (Exception $e) {
            return $this -> failure($e -> getMessage());
        }
    }

}
