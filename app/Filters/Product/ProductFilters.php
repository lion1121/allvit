<?php




namespace App\Filters\Product;


use App\Filters\FiltersAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Filters\Product\GoalFilter;
use App\Filters\Product\VendorFilter;
use App\Filters\Product\TasteFilter;
use App\Filters\Product\PriceFilter;

class ProductFilters extends FiltersAbstract
{
    protected $filters = [
        'vendor' => VendorFilter::class,
        'goal' => GoalFilter::class,
        'taste' => TasteFilter::class,
        'price' => PriceFilter::class,
    ];

}