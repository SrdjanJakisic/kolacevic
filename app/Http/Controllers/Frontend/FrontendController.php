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

    // public function organic()
    // {
    //     $OrganicProducts = Product::where('categoryId', '1')->get();
    //     return view('frontend.products.organic', compact('OrganicProducts'));
    // }

    // public function nonorganic()
    // {
    //     $NonorganicProducts = Product::where('categoryId', '2')->get();
    //     return view('frontend.products.nonorganic', compact('NonorganicProducts'));
    // }

    public function productDetails($id)
    {
        $productDetails = Product::where('id', $id)->first();
        return view('frontend.products.productDetails', compact('productDetails'));
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
        $category = Category::where('status', '0')->get();
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
}
