<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function index()
    {
        $products = Product::with('categories')->get()->random(4);
        return view('home', compact('products'));
    }
}
