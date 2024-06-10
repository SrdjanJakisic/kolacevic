<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $productId = $request->input('productId');
        $productQty = $request->input('productQty');

        if (Auth::check())
        {
            $product_check = Product::where('id', $productId)->first();
            if ($product_check)
            {
                if (Cart::where('productId', $productId)->where('userId', Auth::id())->exists())
                {
                    return response()->json(['status' => $product_check->productName . " је већ у корпи"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->productId = $productId;
                    $cartItem->userId = Auth::id();
                    $cartItem->productQty = $productQty;
                    $cartItem->save();

                    return response()->json(['status' => $product_check->productName . " додат у корпу"]);
                }
            }
        }
        else
        {
            return response()->json(['status' => "Пријавите се да би сте наставили!"]);
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where('userId', Auth::id())->get();
        $total_price = 0;
        foreach($cartItems as $item)
        {
            $total_price += $item->products->productPrice*$item->productQty;
        }
        return view('frontend.cart', compact('cartItems', 'total_price'));
    }

    public function deleteProduct(Request $request)
    {
        if (Auth::check())
        {
            $productId = $request->input('productId');
            if (Cart::where('productId', $productId)->where('userId', Auth::id())->exists())
            {
                $cartItem = Cart::where('productId', $productId)->where('userId', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Производ је успешно обрисан"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $prodQty = $request->input('productQty');

        if (Auth::check())
        {
            if (Cart::where('productId', $productId)->where('userId', Auth::id())->exists())
            {

                $cart = Cart::where('productId', $productId)->where('userId', Auth::id())->first();
                $cart->productQty = $prodQty;
                $cart->update();
                /* return response()->json(['status' => "Количина промењена!"]); */
            }
        }
    }

    public function cartcount(Request $request){
        $cartcount = Cart::where('userId', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }

    public function discountPrice(Request $request) //не мења цену
    {
        $total_price = $request->input('total_price');
        $discount5 = $request->input('discount5');

        $points = User::where('id', Auth::id())->first()->points;
        if($discount5 == '5')
        {
            $total_price = $total_price * 0.95;

            $points = $points - 5;

            $user = User::where('id', Auth::id())->first();
            $user->points = $points;
            $user->update();
            
        }
        $cartItems = Cart::where('userId', Auth::id())->get();
        return view('frontend.cart', compact('total_price', 'cartItems'));
    }
}
