<?php

namespace App;

use CommerceML\Implementation\CommercialInformation;
use Illuminate\Database\Eloquent\Model;
use Mavsan\LaProtocol\Interfaces\ExportOrders as ExportOrders;

class OneCExportOrders extends Model implements ExportOrders
{
    //
    public function exportAllOrders(): CommercialInformation
    {
        // TODO: Implement exportAllOrders() method.
    }
}
