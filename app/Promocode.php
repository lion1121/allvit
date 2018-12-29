<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    //
    protected $fillable = [
        'name', 'quantity', 'status', 'started_at', 'finished_at','promocode_id','prod_category_id'
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function prodCategories()
    {
        return $this->belongsToMany('App\ProdCategory','prod_category_promocodes','promocode_id', 'prod_category_id');
    }
}
