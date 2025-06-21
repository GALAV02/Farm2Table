<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::orderBy('cid')->get();
        $nextCid = category::max('cid') + 1; 
        return view('categories.index',compact('categories', 'nextCid'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cid' => 'required|integer|unique:categories,cid',
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($data);
        return redirect()->route('category.index')->with('success','Category added successfully');;
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
    
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found');
        }
    
        $data = $request->validate([
            'cid' => 'required|integer|unique:categories,cid,' . $category->id,
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);
    
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
    
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found');
        }
    
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
