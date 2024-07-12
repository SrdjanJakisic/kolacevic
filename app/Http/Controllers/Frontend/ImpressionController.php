<?php

namespace App\Http\Controllers\frontend;

use App\Models\Impressions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpressionController extends Controller
{
    public function impressionsPage()
    {
        $impression = Impressions::All();

        return view('frontend.impressions', compact('impression'));
    }

    public function addImpresion(Request $request)
    {
        $impression = new Impressions();
        $impression->impressionComment = $request->input('impresionComment');
        $impression->email = Auth::user()->email;
        $impression->name = Auth::user()->firstName;

        $impression->save();
        $request->session()->put('msg', 'Успешно остављен коментар!');
        $impression = Impressions::all();
        return view('frontend.impressions', compact('impression'));
    }
}
