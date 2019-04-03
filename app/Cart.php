<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'total'
    ];

    protected $appends = ['quantity','total'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function productsList()
    {
        return $this->hasOne('App\Product');
    }

    public function setQuantityAttribute($value)
    {
        return $this->attributes['quantity'] = $value;
    }

    public function setTotalAttribute($value)
    {
        return $this->attributes['total'] = $value;
    }
}
