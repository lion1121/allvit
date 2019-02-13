<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Cviebrock\EloquentSluggable\Services\SlugService;




class ProdCategory extends Model
{

    use Sluggable , NodeTrait {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }

    //Fix traits (Sluggable, NodeTrait) collision
    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);
        (new SlugService())->slug($instance, true);

        return $instance;
    }


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
//    public function products()
//    {
//        return $this->belongsToMany('App\Product', 'category_product', 'prod_category_id', 'product_id');
//    }

    public function products()
    {
        return $this->hasMany('\App\Product');
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
        $path = '';
        // Получаем заглушки всех предков
        $slugs = $this->ancestors()->pluck('slug');
        // Добавляем заглушку самого раздела
        $slugs[] = $this->slug;

        // И склеиваем это все
        foreach ($slugs as $slug) {
            $path .=  '/'.$slug;
        }
        return 'catalog'.$path;
    }

    public function generatePath()
    {
        $slug = $this->slug;

        $this->path = $this->isRoot() ? $slug : $this->parent->path.'/'.$slug;

        return $this;
    }

    public function updateDescendantsPaths()
    {
        // Получаем всех потомков в древовидном порядке
        $descendants = $this->descendants()->defaultOrder()->get();

        // Данный метод заполняет отношения parent и children
        $descendants->push($this)->linkNodes()->pop();

        foreach ($descendants as $model) {
            $model->generatePath()->save();
        }
    }

    public function children()
    {
        return $this->hasMany('App\ProdCategory', 'parent_id', 'id');
    }

}
