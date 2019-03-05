<?php
/**
 * Created by PhpStorm.
 * User: sergey-pc
 * Date: 07.02.19
 * Time: 15:30
 */

namespace App\Filters\Product;

use Illuminate\Database\Eloquent\Builder;

class VendorFilter
{
    public function filter(Builder $builder, $value)
    {
        $vendors = explode(',', urldecode($value));
        return $builder->whereIn('vendor', $vendors);
    }
}
