<?php

namespace App\Http\Controllers\Api;

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
        $productsPag = Product::whereIn('prod_category_id', $categories)->filter($request)->paginate(12);
        $filterParameters = $this->filterParameters($products);

        return response()->json([
            'status' => 'ok',
            'listing' => $productsPag,
            'sidebar' => $filterParameters,
            'category' => $category
        ],200);
    }
}
