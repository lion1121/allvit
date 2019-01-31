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
    public function show($path)
    {
        $categoryParam = explode('/', $path);
        $category = ProdCategory::with('products')->where('slug', '=', end($categoryParam))->firstOrFail();
        $products = $category->products()->get();
        $categoryPath = $category->generatePath()->path;
        $filterParameters = $this->filterParameters($products);

        return view('front.shop.shop', compact('products','category','categoryPath'))->with($filterParameters);
    }

    public function showProduct($categoryParam,$productSlug)
    {
        $categoryParam = explode('/', $categoryParam);
        $category = ProdCategory::where('slug', '=', end($categoryParam))->firstOrFail();//
        $product = $category->products()->where('slug',$productSlug)->first();

        return view('front.shop.shop-single', compact('product','category'));
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
        dump($category);

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
