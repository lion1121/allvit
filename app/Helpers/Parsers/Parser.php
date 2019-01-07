<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 22:33
 */

namespace App\Helpers\Parsers;


interface Parser
{
    public function read();
    public function parse();

}