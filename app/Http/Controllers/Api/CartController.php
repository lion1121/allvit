<?php

namespace App\Http\Controllers\Api;

use App\Cart;
use App\Product;
use App\User;
use function foo\func;
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
            //Get all products that contains in carts table by id
            $cartProducts = User::findOrFail($user_id)->cart()->get();
            //Get only products that were not paid
            $getNonPaidProducts = $cartProducts->filter(function($value, $key){
                if($value['paid'] === 0){
                    return $value;
                }
            });
            //Save all received products id in array
            $cartProductsId = $getNonPaidProducts->pluck('product_id')->all();
            //Save all received products id and quantity in array
            $cartQuantity = $cartProducts->pluck('quantity', 'product_id')->all();
            $products = Product::whereIn('id', $cartProductsId)->get();
            $products = $products->map(function ($item, $key) use ($cartQuantity) {
                foreach ($cartQuantity as $key => $value) {
                    if ($item->id === $key) {
                        $item->quantity = $value;
                        // Count and add total price to each product
                        $item->total = $value * $item->price;
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
            // Get product from DB -> add total and quantity and response to client
            $modifyProduct = Product::where('id', $request->product)->first();
            $modifyProduct->quantity = $request->quantity;

            $input = [];
            $input['product_id'] = $request->product;
            $input['user_id'] = Auth::id();
            $product = Cart::firstOrNew(['product_id' => $request->product,'user_id' => Auth::id()], $input);
            $product->quantity = ($product->quantity + $request->quantity);
            $product->total = ($product->quantity) * $modifyProduct->price;
            $product->save();

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
            $newQuantity = $request->quantity;
            $userId = Auth::id();
            $match = ['product_id' => $productId, 'user_id' => $userId];
            $cartProduct = Cart::where($match)->first();
            $currentQuantity = $cartProduct->quantity;
            $cartProduct->quantity = $newQuantity;
            if ($currentQuantity > $newQuantity) {
                $cartProduct->total -= ($currentQuantity - $newQuantity) * $product['price'];
            } else if ($currentQuantity < $newQuantity) {
                $cartProduct->total += ($newQuantity - $currentQuantity) * $product['price'];
            }
            $cartProduct->save();
            return response()->json($newQuantity);
        }
    }

    public function getUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        return response()->json($user);
    }


}
