<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function userDetails($id)
    {
        $user = User::find($id);
        return view('admin.users.userDetails', compact('user'));
    }

    public function deleteUser($id)
    { 
        $user = User::find($id);
        $user->delete();
        return redirect('users')->with('msg', 'Успешно обрисан корисник');
    }

    public function createManager()
    {
        return view('admin.users.createManager');
    }

    public function insertManager(Request $request)
    {
        $validator = $request->validate(
            [
                'phone' => ['int']
            ]
        );
        
        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->role_as = $request->input('role_as');
        $user->save();
        $request->session()->put('msg', 'Успешно додат менаџер!');
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }    
}
