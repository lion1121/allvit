<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Http\Traits\filterParameters;

use App\ProdCategory;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    use filterParameters;

    //
    public function show(Request $request, $path)
    {
        $categoryParam = explode('/', $path);
        $category = ProdCategory::where('slug', '=', end($categoryParam))->firstOrFail();

        $categories = $category->descendants()->pluck('id');
        $categories[] = $category->getKey();

        $products = Product::whereIn('prod_category_id', $categories)->filter($request)->get();
        $filterParameters = $this->filterParameters($products);

          return  new ProductResource(Product::whereIn('prod_category_id', $categories)->filter($request)->paginate(12),$filterParameters);


    }
}
