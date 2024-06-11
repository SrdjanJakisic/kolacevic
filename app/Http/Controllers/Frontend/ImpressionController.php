<?php

namespace App\Http\Controllers\frontend;

use App\Models\Impressions;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpressionController extends Controller
{
    public function impressionsPage()
    {
        return view('frontend.impressions');
    }

    public function addImpresion(Request $request)
    {
        $impressionComment = $request->input('impresionComment');

        $impression = new Impressions();
        $impression->impressionComment = $request->input('impresionComment');
        
        $impression->save();
        $request->session()->put('msg', 'Успешно додат менаџер!');
        $impression = Impressions::all();
        return view('frontend.impressions', compact('impression'));
    }
}
