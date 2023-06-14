<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showAll()
    {
        $products = Product::all();

        return view('products.products_list', [
            'products' => $products
        ]);
    }
    public function showOne($cat, $product_id)
    {
        $product = Product::where('id', $product_id)->first();
        return view('products.product', [
            'product' => $product
        ]);
    }
    public function category($cat)
    {
        $cat = Category::where('slug', $cat)->first();
        $products = $cat->products;
        return view('products.products_list', [
            'products' => $products
        ]);
    }
    public function create()
    {
        return view('admin.product.product_create');
    }



    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->available = $request->available;
        $product->category_id = $request->category_id;
        $product->save();
        if ($request->images) {
            foreach ($request->images as $image) {
                $product_image = new ProductImage();
                $product_image->img = Storage::put('/public/images', $image);
                $product_image->product_id = $product->id;
                $product_image->save();
            }
        }
        return redirect()->route('products')
            ->with('success', 'Product has been created successfully.');
    }

    public function edit($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        return view('admin.product.product_edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::where('id', $product_id)->first();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->available = $request->available;
        $product->save();

        return redirect()->route('product.edit', $product->id)
            ->with('success', 'Product has been updated successfully.');
    }

    public function destroy(Request $request, $product_id)
    {
        $product = Product::where('id', $product_id)->first();;
        $product->delete();

        return redirect()->route('products')
            ->with('success', 'Product has been deleted successfully.');
    }
}
