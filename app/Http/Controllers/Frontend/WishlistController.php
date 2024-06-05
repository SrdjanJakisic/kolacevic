<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('userId', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function addProduct(Request $request)
    {
        if (Auth::check())
        {
            $productId = $request->input('productId');
            if (Product::find($productId))
            {
                $wish = new Wishlist();
                $wish->productId = $productId;
                $wish->userId = Auth::id();
                $wish->save();

                return response()->json(['status' => "Производ је додат на листу жеља"]);
            }
            else
            {
                return response()->json(['status' => "Производ не постоји!"]);
            }
        }
        else
        {
            return response()->json(['status' => "Пријавите се да би сте наставили!"]);
        }
    }

    public function removeProduct(Request $request)
    {
        if (Auth::check())
        {
            $productId = $request->input('productId');
            if (Wishlist::where('productId', $productId)->where('userId', Auth::id())->exists())
            {
                $wishlist = Wishlist::where('productId', $productId)->where('userId', Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => "Производ је успешно обрисан"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
}
