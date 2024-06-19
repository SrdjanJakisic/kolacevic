<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showAboutus()
    {
        return view('frontend.aboutus');
    }

    public function showContact()
    {
        return view('frontend.contact');
    } 
}
