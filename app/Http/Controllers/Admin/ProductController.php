<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $products = new Product();

        if ($request->hasFile('productImage'))
        {
            $file = $request->file('productImage');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->productImage = $filename;
        }
        $products->categoryId = $request->input('categoryId');
        $products->productName = $request->input('productName');
        $products->productDescription = $request->input('productDescription');
        $products->productPrice = $request->input('productPrice');
        $products->productQuantity = $request->input('productQuantity');
        $products->productWeight = $request->input('productWeight');
        $products->save();
        return redirect('products')->with('msg', "Производ успешно убачен");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('products', 'category'));
    }
    
    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if ($request->hasFile('productImage'))
        {
            $path = 'assets/uploads/products' . $products->productImage;
            if (File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('productImage');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->productImage = $filename;
        }
        $products->categoryId = $request->input('categoryId');
        $products->productName = $request->input('productName');
        $products->productDescription = $request->input('productDescription');
        $products->productPrice = $request->input('productPrice');
        $products->productQuantity = $request->input('productQuantity');
        $products->productWeight = $request->input('productWeight');
        $products->update();
        return redirect('products')->with('msg', "Производ успешно измењен");
    }

    public function delete($id)
    {
        
        $products = Product::find($id);
        $path = 'assets/uploads/products' . $products->productImage;
        if (File::exists($path))
        {
            File::delete($path);
        }
        $products->delete();
        return redirect('products')->with('msg', "Производ успешно обрисан");
    }
}
