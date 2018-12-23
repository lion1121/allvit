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
        'description','promocode_id','prod_category_id'

    ];
    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_product', 'prod_category_id', 'product_id');
    }
    public function promocode()
    {
        return $this->belongsToMany('App\Promocode','prod_category_promocodes','promocode_id','prod_category_id');
    }
}
