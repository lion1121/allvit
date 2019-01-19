<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 8:53 PM
 */

namespace Mavsan\LaProtocol\Interfaces;


use CommerceML\Implementation\CommercialInformation;

interface ExportOrders
{
    /**
     * @return CommercialInformation Данные о заказах, соответствувющие тегу "Коммерческая информация"
     */
    function exportAllOrders(): CommercialInformation;
}
