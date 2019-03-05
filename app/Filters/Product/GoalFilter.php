<?php


namespace App\Filters\Product;
use Illuminate\Database\Eloquent\Builder;

class GoalFilter
{
    public function filter(Builder $builder, $value)
    {
        return $builder->whereJsonContains('goals', explode(',',$value));
    }
}