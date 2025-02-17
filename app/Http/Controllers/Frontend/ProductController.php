<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Homepage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function sortByPriceDesc($id)
    {
        $category = Category::where('id', $id)->first();
        $products = Product::where('categoryId', $id)->orderBy('productPrice', 'desc')->get();
        return view('frontend.products.index', compact('products', 'category'));
    }

    public function sortByPriceAsc($id)
    {
        $category = Category::where('id', $id)->first();
        $products = Product::where('categoryId', $id)->orderBy('productPrice', 'asc')->get();
        return view('frontend.products.index', compact('products', 'category'));
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
}
