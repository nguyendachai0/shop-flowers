<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $categories = Category::all();
        $category = new Category();
        $category->name = $data['name'];
        $category->status = $data['status'];

        $category->save();
        return redirect()->route('admin.category.index', compact('categories'))->with('success', 'Category created successfully.');
    }

    // Display the specified category.
    public function show(Category $category)
    {
        return view('admin.category.index', compact('category'));
    }

    // Show the form for editing the specified category.
    public function edit($id)
    {
        $categoryToEdit = Category::find($id);
        $categories = Category::all();
        return view('admin.category.index', compact('categories', 'categoryToEdit'));
    }

    // Update the specified category in storage.
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $category->name = $data['name'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified category from storage.
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
}
