<?php

namespace App\Http\Controllers;

use App\ProdCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdCategoryController extends Controller
{

    public function show(Request $request)
    {
        //Get last category from URL
        $urlCategory = end($request->route()->parameters);
        $selectedCategory = ProdCategory::where('slug', $urlCategory)->first();
        $categoryId = ProdCategory::where('slug', $urlCategory)->first()->id;
        $category = ProdCategory::findOrFail($categoryId);
//        dd($selectedCategory );
        if($selectedCategory->parent_id !== null){

            $products = $category->products()->paginate(12);
//            dd($products);
            //get all unique vendors
            $vendors = $category->products()->get()->toArray();
            $vendors = collect($vendors)->groupBy('vendor')->map(function ($vendor){
                    return $vendor->count();
            });
            return view('front.shop.shop', compact('products','category','vendors'));
        } else {
            //get child categories
            return '123';
            $childCategories = $selectedCategory->where('parent_id', $selectedCategory->id)->get();
            //get top 50 products
            $products = Product::take(50)->paginate(12);
            return view('front.shop.shop', compact('products','childCategories','category'));
        }

    }

    public function getAllCategories(Request $request)
    {
        $category = DB::table('prod_categories')->where('name', $request->body)
            ->orWhere('name', 'like', '%' . $request->category . '%')->get();
        echo json_encode($category);
    }

    public function getCategoryByPromocodeId(Request $request)
    {
        $category = DB::table('prod_categories')->where('name', $request->body)
            ->orWhere('name', 'like', '%' . $request->category . '%')->get();
        echo json_encode($category);
    }

}
