<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.index', compact('products', 'categories'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->status = $data['status'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('uploads/products', $imageName);
            $product->image = 'products/' . $imageName;
        }
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }
    public function show(Product $product)
    {
        return view('admin.product.index', compact('product'));
    }

    // Show the form for editing the specified product.
    public function edit($id)
    {
        $productToEdit = Product::find($id);
        $products = Product::all();
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.index', compact('products', 'productToEdit', 'categories'));
    }

    // Update the specified product in storage.
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->name = $data['name'];
        $product->status = $data['status'];
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('uploads/products', $imageName);
            $product->image = 'products/' . $imageName;
        }

        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage.
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
