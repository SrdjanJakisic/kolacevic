<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();

        if ($request->hasFile('categoryImage')) {
            $file = $request->file('categoryImage');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/categories/', $filename);
            $category->image = $filename;
        }

        $category->name = $request->input('categoryName');
        $category->description = $request->input('categoryDescription');
        $category->save();
        return redirect('categories')->with('msg', "Категорија успешно убачена");

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if ($request->hasFile('categoryImage')) {
            $path = 'assets/uploads/categories' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('categoryImage');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/categories/', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('categoryName');
        $category->description = $request->input('categoryDescription');
        $category->update();
        return redirect('categories')->with('msg', "Категорија успешно промењена");
    }

    public function delete($id)
    {
        $category = Category::find($id);
        //$product = Product::count()->where("categoryId" == $id);
        $products = Product::where('categoryId', $id)->get();
        if ($products->count() > 0) 
        {
            return redirect('categories')->with('msgRed', "Категорија садржи производе!");
        } 
        else 
        {
            if ($category->image) {
                $path = 'assets/uploads/categories/' . $category->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            $category->delete();
        }

        return redirect('categories')->with('msg', "Категорија је успешно обрисана!");
    }
}
