<?php
/**
 * Created by PhpStorm.
 * User: sergey-pc
 * Date: 06.02.19
 * Time: 13:39
 */

namespace App\Filters\Product;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter(Builder $builder)
    {
        return $builder;
    }

}