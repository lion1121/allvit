<?php

namespace App\Http\Controllers;

use App\ProdCategory;
use App\Product;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class shopController extends Controller
{
    //
    public function show(Request $request)
    {
        $productSlug = end($request->route()->parameters);
        $product = Product::where('slug', $productSlug)->first();
        return view('front.shop.shop-single', compact('product'));
    }

    public function top50($category)
    {
        //Get last category from URL
        $category = ProdCategory::with('subcategories')->where('slug', $category)->first();

        $categories = $category->subcategories()->get();

        return view('front.shop.shop-main-category', compact('category', 'categories'));
    }

    public function showCategories(Request $request)
    {
        //Get last category from URL
        $urlCategory = end($request->route()->parameters);
        $category = ProdCategory::with(['subcategories.products'])->where('slug', $urlCategory)->first();
        $products = new Collection();
        if (count($request->route()->parameters) === 2) {
            $subCategoryCollections = $category->subcategories()->get();
            foreach ($subCategoryCollections as $item) {
                $products = $products->merge($item->products()->get());
            }

        } elseif (count($request->route()->parameters) === 3) {
            $products = $category->products()->get();
        }

        // Sidebar filter parameters
        {
            // return vendor names with count
            $vendors = $products->sortBy('vendor')->groupBy('vendor')->map(function ($vendor) {
                return $vendor->count();
            });

            $attributesArrays = $products->where('attributes', '!=', null)->sortBy('attributes')
                ->groupBy('attributes')->keys()->map(function ($attribute) {
                    $attributeArray = json_decode($attribute, true);
                    return array_combine($attributeArray['Вкус'], $attributeArray['quantity']);
                });

            $tastes = [];
            for ($i = 0; $i < count($attributesArrays); $i++) {
                $keys = array_keys($attributesArrays[$i]);
                for ($k = 0; $k < count($attributesArrays[$i]); $k++) {
                    if (!array_key_exists($keys[$k], $tastes)) {
                        $tastes[$keys[$k]] = 1;
                    } else {
                        $tastes[$keys[$k]] += 1;
                    }
                }
            }

            $min = $products->where('price', '!=', null)->groupBy('price');

            $ingredients = $products->where('ingredients', '!=', null)->map(function ($item) {
                $attributeArray = json_decode($item->ingredients);
                return $attributeArray;
            });

            $allIngredients = [];
            foreach ($ingredients as $ingredientElement) {
                foreach ($ingredientElement as $item => $value) {
                    if (!array_key_exists($value, $allIngredients)) {
                        $allIngredients[$value] = 1;
                    } else {
                        $allIngredients[$value] += 1;
                    }
                }
            }
        }

        return view('front.shop.shop', compact('products', 'category', 'vendors', 'tastes','allIngredients'));
    }

}
