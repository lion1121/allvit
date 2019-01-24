<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    //
    public function show(Request $request)
    {
        $productSlug = end($request->route()->parameters);
        $product = Product::where('slug', $productSlug)->first();
        return view('front.shop.shop-single', compact('product'));
    }
}
