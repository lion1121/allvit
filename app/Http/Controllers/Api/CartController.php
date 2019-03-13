<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function getCartProducts(Request $request)
    {
        if(Auth::user() !== null){
            $user_id = Auth::id();
            $cartProducts = User::findOrFail($user_id)->cart()->get();
            return response()->json(['user_id' => $user_id, 'products' => $cartProducts]);
        }
    }

//    public function userStatus(Request $request)
//    {
//        if(Auth::user() !== null){
//            return response()->json(Auth::id());
//        }
//    }
}
