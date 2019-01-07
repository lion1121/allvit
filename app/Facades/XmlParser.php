<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 23:21
 */

namespace App\Facades;


use Arrilot\Widgets\Facade;

class XmlParser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'XmlParser';
    }
}