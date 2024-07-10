<?php


namespace App\Http\Controllers\frontend;

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
}
