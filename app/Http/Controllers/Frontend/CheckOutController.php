<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index(Request $request)
    {
        // проверава да ли је покупио ишта са request
        // dd($request->all); 
        $oldCartItems = Cart::where('userId', Auth::id())->get();
        $total = $request->input('totalDiscount');

        foreach ($oldCartItems as $item)
        {
            if (!Product::where('id', $item->productId)->where('productQuantity', '>=', $item->productQty)->exists())
            {
                $removeItem = Cart::where('userId', Auth::id())->where('productId', $item->productId)->first();
                $removeItem->delete();
            }
            $cartItems = Cart::where('userId', Auth::id())->get(); 
        }
        return view('frontend.checkout', compact('cartItems', 'total'));
    }

    public function placeOrder(Request $request)
    {
        
        $order = new Order();
        $order->userId = Auth::id();
        $order->firstName = $request->input('firstName');
        $order->lastName = $request->input('lastName');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->adress = $request->input('address');
        $order->city = $request->input('city');

        $total = $request->input('totalDiscount');

        $order->totalPrice = $total;
        $order->trackingNumber = 'order' . rand(1111, 9999);
        $order->save();

        $order->OrderId;

        $cartItems = Cart::where('userId', Auth::id())->get();
        foreach ($cartItems as $item)
        {
            OrderItem::create([
                'orderId' => $order->id,
                'productId' => $item->productId,
                'productName' => $item->products->productName,
                'qty' => $item->productQty,
                'price' => $item->products->productPrice,
            ]);

            $product = Product::where('id', $item->productId)->first();
            $product->productQuantity = $product->productQuantity - $item->productQty;
            $product->update();
        }

        if (Auth::user()->address == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->firstName = $request->input('firstName');
            $user->lastName = $request->input('lastName');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->update();
        }

        $fullprice = 0;
        foreach ($cartItems as $item) 
        {
            $fullprice += $item->products->productPrice * $item->productQty;
        }

        $userPoints = User::where('id', Auth::id())->first();
        $oldPoints = $userPoints->points;
        $newPoints = 0;
        if($fullprice > $total)
        {
            $newPoints = $oldPoints-5;
        }
        $userPoints->points = $newPoints;
        $userPoints->update();

        $quantity = 0;
        foreach($cartItems as $item)
        {
            $quantity += $item->productQty;
        }

        if($quantity > 5)
        {
            $userPoints = User::where('id', Auth::id())->first();
            $userPoints->points += 1;
            $userPoints->update();
        }

        $cartItems = Cart::where('userId', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('msg', "Успешно наручено!");
    }
}
