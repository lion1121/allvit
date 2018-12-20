<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    //

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function prodCategories()
    {
        return $this->hasMany('App\ProdCategory');
    }
}
