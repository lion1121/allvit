<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.03.2019
 * Time: 13:38
 */

namespace App\Filters\Product;
use Illuminate\Database\Eloquent\Builder;


class IngredientFilter
{
    public function filter(Builder $builder, $value)
    {
        return $builder->whereJsonContains('ingredients', explode(',',$value));
    }
}