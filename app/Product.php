<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
                'source' => 'fullslug'
            ]
        ];
    }

    public function getFullslugAttribute()
    {
        return $this->name . '-' . $this->vendor_code;
    }

    public function getCategoryNameAttribute()
    {
        return $this->categories()->first()->name . ' ' . $this->name;
    }

    protected $fillable = [
        'inner_id', 'vendor', 'vendor_code', 'barcode', 'name', 'full_name', 'availability', 'slug', 'weight', 'packing',
        'portions_count', 'price', 'discount_price', 'description', 'status', 'ingredients', 'goals', 'present', 'free_delivery',
        'order_only', 'gender', 'vendors_country', 'vendor_country_brand', 'form', 'portion_size', 'currency', 'outter_code', 'attributes'
    ];

    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany('App\ProdCategory', 'category_product', 'product_id', 'prod_category_id');
    }

    public function properties()
    {
        return $this->hasMany('App\Property');
    }

    public function promocode()
    {
        return $this->belongsToMany('App\Promocode');
    }

    public function getProdCatUrl()
    {
        $url = $this->categories()->first()->getUrl() . '/' . $this->slug;
        return $url;

    }

    public function getCategoryUrl()
    {
        $url = $this->categories()->first()->generatePath()->path;
        return $url;
    }


    public function children()
    {
        return $this->hasMany('App\ProdCategory', 'parent_id', 'id');
    }
}
