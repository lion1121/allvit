<?php

namespace App\Http\Controllers;

use App\ProdCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdCategoryController extends Controller
{
    //
    public function show(Request $request)
    {
        //Get last category from URL
        $urlCategory = end($request->route()->parameters);
        $categoryId = ProdCategory::where('slug', $urlCategory)->first()->id;
        $category = ProdCategory::findOrFail($categoryId);
        $products = $category->products()->paginate(12);
        return view('front.shop.shop', compact('products','category'));
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
