<?php

namespace App\Http\Controllers;

use App\Http\Traits\filterParameters;
use App\ProdCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class shopController extends Controller
{
    use filterParameters;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $productSlug = end($request->route()->parameters);
        $product = Product::where('slug', $productSlug)->first();
        return view('front.shop.shop-single', compact('product'));
    }

    /**
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function top50($category)
    {
        //Get last category from URL
        $category = ProdCategory::with('subcategories')->where('slug', $category)->first();

        $categories = $category->subcategories()->get();

        return view('front.shop.shop-main-category', compact('category', 'categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategories(Request $request)
    {
        //Get last category from URL
        $urlCategory = end($request->route()->parameters);
        $category = ProdCategory::with(['subcategories.products'])->where('slug', $urlCategory)->first();

        //Get products from chosen subcategory
        if (count($request->route()->parameters) === 2) {
            $products = new Collection();
            $subCategoryCollections = $category->subcategories()->get();
            foreach ($subCategoryCollections as $item) {
                $products = $products->merge($item->products()->get());
            }
            $allProducts = $products;
            $products = $products->forPage(1, 12);

            //Get products from chosen category + subcategories
        } elseif (count($request->route()->parameters) === 3) {

            $allProducts = $category->products()->get();
            $products = $category->products()->get()->forPage(1, 12);
        }

        /**
         * Load from trait
        */
       $filterParameters = $this->filterParameters($allProducts);
        return view('front.shop.shop', compact('products','category'))->with($filterParameters);
    }

}
