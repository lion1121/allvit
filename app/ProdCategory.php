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

    public function subcategories(){
        return $this->hasMany('\App\ProdCategory', 'parent_id');
    }

    public function parent(){
        return $this->belongsTo('\App\ProdCategory', 'parent_id');
    }

    public function getUrl()
    {
        $url = $this->slug;

        $category = $this;

        while ($category = $category->parent) {
            $url = $category->slug.'/'.$url;
        }

        return $url;
    }

    public function children()
    {
        return $this->hasMany('App\ProdCategory', 'parent_id', 'id');
    }
}
