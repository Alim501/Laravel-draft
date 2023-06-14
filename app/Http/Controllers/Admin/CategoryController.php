<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categries = Category::all();
        return view('admin.category', [
            'categories' => $categries
        ]);
    }
    public function create()
    {
        return view('admin.create_category');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('category.index')
            ->with('success', 'Category has been created successfully.');
    }

    public function edit($category_id)
    {
        $category= Category::where('id',$category_id)->first();
        return view('admin.product.product_edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request,$category_id)
    {
        $category= Category::where('id',$category_id)->first();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('category.edit',$category->id)
            ->with('success', 'Category has been updated successfully.');
    }

    public function destroy(Request $request,$category_id)
    {
        $category= Category::where('id',$category_id)->first();
        $category->delete();

        return redirect()->route('category.index')
        ->with('success', 'Category has been deleted successfully.');
    }
}