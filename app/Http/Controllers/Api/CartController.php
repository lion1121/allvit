<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function getCartProducts(Request $request)
    {
        if (Auth::user() !== null) {
            $user_id = Auth::id();
            $cartProducts = User::findOrFail($user_id)->cart()->get();
            $cartProductsId = $cartProducts->pluck('product_id')->all();
            $cartQuantity = $cartProducts->pluck('quantity', 'product_id')->all();
            $products = Product::whereIn('id', $cartProductsId)->get();
            $products = $products->map(function ($item, $key) use ($cartQuantity) {
                foreach ($cartQuantity as $key => $value) {
                    if ($item->id === $key) {
                        $item->quantity = $value;
                    }
                }
                return $item;
            });

            return response()->json(['user_id' => $user_id, 'products' => $products]);
        }
    }

    public function userStatus(Request $request)
    {
        if (Auth::user() !== null) {
            return response()->json(Auth::id());
        } else {
            return response('null');
        }
    }

    public function addProduct(Request $request)
    {
        if (Auth::user() !== null) {
            $input = [];
            $input['product_id'] = $request->product;
            $input['user_id'] = Auth::id();
            $product = Cart::firstOrNew(['product_id' => $request->product], $input);
            $product->quantity = ($product->quantity + $request->quantity);
            $product->save();
            $modifyProduct = Product::find($request->product)->first();
            $modifyProduct->quantity = $request->quantity;
            return response()->json($modifyProduct);
        }
    }

    public function removeProduct(Request $request)
    {
        if (Auth::user() !== null) {
            $product = $request->product;
            $productId = $product['id'];
            $userId = Auth::id();
            $match = ['product_id' => $productId, 'user_id' => $userId];
            Cart::where($match)->delete();
            return response()->json($product);
        }
    }

    public function updateProduct(Request $request)
    {
        if (Auth::user() !== null) {
            $product = $request->product;
            $productId = $product['id'];
            $quantity = $request->quantity;
            $userId = Auth::id();
            $match = ['product_id' => $productId, 'user_id' => $userId];
            $cartProduct = Cart::where($match)->get();
            $cartProduct->quantity = $quantity;
            $cartProduct->save();
            return response()->json($cartProduct);
        }
    }


}
