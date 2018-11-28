<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\ProdCategory', 'category_product', 'product_id', 'prod_category_id');
    }

    public function properties()
    {
        return $this->belongsToMany('App\Property', 'product_property', 'product_id', 'property_id')->withPivot('value');
    }

}
