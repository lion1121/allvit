<?php
/**
 * Created by PhpStorm.
 * User: sergey-pc
 * Date: 21.02.19
 * Time: 13:40
 */

namespace App\Filters\Product;
use Illuminate\Database\Eloquent\Builder;


class PriceFilter
{
    public function filter(Builder $builder, $value)
    {
        return $builder->whereBetween('price', explode(',',$value));
    }
}