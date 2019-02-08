<?php
/**
 * Created by PhpStorm.
 * User: sergey-pc
 * Date: 07.02.19
 * Time: 21:51
 */

namespace App\Filters\Product;


use Illuminate\Database\Eloquent\Builder;

class TasteFilter
{
    public function filter(Builder $builder, $value)
    {
        return $builder->whereJsonContains('attributes->Вкус', explode(',',$value));
    }
}
