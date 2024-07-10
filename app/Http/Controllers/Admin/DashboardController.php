<?php

namespace App\Http\Controllers\Admin;

use App\Models\Homepage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


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
                'phone' => ['required', 'regex:/^[+]*\d*$/']
            ],
            [
                'phone.regex' => 'broj telefona nije u ispravnom formatu'
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

    public function carouselList()
    {
        $carousel = Homepage::all();
        return view('admin.carousel.index', compact('carousel'));
    }

    public function editCarousel($id)
    {
        $carousel = Homepage::find($id);
        return view('admin.carousel.editcarousel', compact('carousel'));
    }

    public function updateCarousel(Request $request, $id)
    {
        $carousel = Homepage::find($id);

        if ($request->hasFile('carouselImage')) {
            $path = 'assets/uploads/home' . $carousel->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('carouselImage');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/home/', $filename); 
            $carousel->image = $filename;
        }
        $carousel->title = $request->input('carouselTitle');
        $carousel->description = $request->input('carouselDescription');
        $carousel->update();
        return redirect('carousel')->with('msg', "Слајдер успешно измењен");
    }
}