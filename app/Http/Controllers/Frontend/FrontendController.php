<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $all_products = Product::all();
        return view('frontend.index', compact('all_products'));
    }

    public function sortByPriceDesc()
    {
        $all_products = Product::orderBy('productPrice', 'desc')->get();
        return view('frontend.products.index', compact('all_products'));
    }

    public function sortByPriceAsc()
    {
        $all_products = Product::orderBy('productPrice', 'asc')->get();
        return view('frontend.products.index', compact('all_products'));
    }

    public function category()
    {
        $category = Category::all();
        return view('frontend.category', compact('category'));
    }

    public function viewCategory($id)
    {
        $category = Category::where('id', $id)->first();
        $products = Product::where('categoryId', $id)->get();

        return view('frontend.products.index', compact('category', 'products'));
    }

    public function productView($id, $productId)
    {
        $products = Product::where('id', $productId)->first();
        return view('frontend.products.view', compact('products'));
    }

    public function showAboutus()
    {
        return view('frontend.aboutus');
    }

    public function showContact()
    {
        return view('frontend.contact');
    }

    public function impressionsPage()
    {
        return view('frontend.impressions');
    }
}
