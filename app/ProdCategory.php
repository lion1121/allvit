<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdCategory extends Model
{
    //
    protected $table = 'prod_categories';

    protected $fillable = [
        'slug',
        'parent_id',
        'name',
        'description'
    ];
    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_product', 'prod_category_id', 'product_id');
    }
}
