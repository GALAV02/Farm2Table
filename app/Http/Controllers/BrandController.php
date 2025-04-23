<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = brand::orderBy('bid')->get();
        return view('brands.index',compact('brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bid' => 'required|integer|unique:brands,bid',
            'name' => 'required|string|max:255|unique:brands,name',
        ]);
        brand::create($data);
        return redirect()->route('brand.index')->with('success','Brand added successfully');;
    }

    public function update(Request $request)
    {
        $category = brand::find($request->id);
    
        if (!$category) {
            return redirect()->route('brand.index')->with('error', 'Brand not found');
        }
    
        $data = $request->validate([
            'bid' => 'required|integer|unique:brands,bid,' . $category->id,
            'name' => 'required|string|max:255|unique:brands,name,' . $category->id,
        ]);
    
        $category->update($data);
        return redirect()->route('brand.index')->with('success', 'Brand updated successfully');
    }

    public function destroy(Request $request)
    {
        $category = brand::find($request->id);
    
        if (!$category) {
            return redirect()->route('brand.index')->with('error', 'Brand not found');
        }
    
        $category->delete();
        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully');
    }
}
