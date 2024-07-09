<?php


namespace App\Http\Controllers\frontend;

use App\Models\Homepage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $firstSlide = Homepage::first();
        $secondSlide = Homepage::where('id', '2')->first();;
        $thirdSlide = Homepage::where('id', '3')->first();;
        
        return view('frontend.index', compact('firstSlide', 'secondSlide', 'thirdSlide'));
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
