<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProdCategory extends Model
{

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public $timestamps = false;

    protected $table = 'prod_categories';

    protected $fillable = [
        'slug',
        'parent_id',
        'inner_id',
        'name',
        'description','promocode_id','prod_category_id'

    ];
    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_product', 'prod_category_id', 'product_id');
    }
    public function promocodes()
    {
        return $this->belongsToMany('App\Promocode','prod_category_promocodes','prod_category_id','promocode_id');
    }
}
