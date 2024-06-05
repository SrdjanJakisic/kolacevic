<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('orderStatus', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.orders.orderDetails', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->orderStatus = $request->input('orderStatus');
        $orders->update();
        return redirect('orders')->with('msg', "Успешно промењено");
    }

    public function completedOrders()
    {
        $orders = Order::where('orderStatus', '1')->get();
        return view('admin.orders.completedOrders', compact('orders'));
    }
}
