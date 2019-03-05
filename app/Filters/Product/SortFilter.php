<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.03.2019
 * Time: 22:55
 */

namespace App\Filters\Product;
use Illuminate\Database\Eloquent\Builder;


class sortFilter
{
    public function filter(Builder $builder, $value)
    {
        $sortData = explode(',', urldecode($value));
        list($columnName,$orderType) = $sortData;
        return $builder->orderBy($columnName,$orderType);
    }
}