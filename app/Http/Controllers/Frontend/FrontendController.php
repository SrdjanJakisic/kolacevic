<?php


namespace App\Http\Controllers\frontend;

use App\Models\Message;
use App\Models\Homepage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $homepage = Homepage::all();

        return view('frontend.index', compact('homepage'));
    }
    public function showAboutus()
    {
        return view('frontend.aboutus');
    }

    public function showContact()
    {
        return view('frontend.contact');
    } 

    public function sendMessage(Request $request)
    {
        $messageModel = new Message();
        $messageModel->email = $request->input('email');
        $messageModel->name = $request->input('name');
        $messageModel->phone = $request->input('phone');
        $messageModel->message = $request->input('message');

        $messageModel->save();
        $request->session()->put('msg', 'Порука успешно послата!');

        return view('frontend.contact');
    }
}
