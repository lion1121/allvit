<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'product_id',
        'slug',
        'key',
        'value'
    ];

    public function products()
    {
        return $this->belongsTo('App\Product','product_id', 'id');
    }
}
