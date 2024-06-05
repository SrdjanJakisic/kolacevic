<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('userId', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::where('id', $id)->where('userId', Auth::id())->first();
        return view('frontend.orders.orderDetails', compact('order'));
    }

    public function editUser()
    {
        $user = User::where('id', Auth::id())->first();
        return view('frontend.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->update();
        $request->session()->put('msg', 'Успешно измењени подаци!');
        return view('frontend.editUser', compact('user'));
    }

    public function editPassword()
    {
        $user = User::where('id', Auth::id())->first();
        return view('frontend.editPassword', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');

        $user = User::find($id);

        if($password1 != $password2)
        {
            $request->session()->put('msg', 'Шифре нису исте!');
            return view('frontend.editPassword', compact('user'));
        }
        else
        {
            $user->password = Hash::make($request->input('password1'));
            $user->update();
            $request->session()->put('msg', 'Успешно измењенa шифра!');
            return view('frontend.editUser', compact('user'));
        }
    }
}
