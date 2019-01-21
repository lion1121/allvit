<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function index()
    {
        $products = Product::all()->random(4);
//        dd($products);
        return view('home', compact('products'));
    }
}
