<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromocodeController extends Controller
{
    //
    public function index()
    {
        return view('vendor/voyager/promocode');
    }
}
