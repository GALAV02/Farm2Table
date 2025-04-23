<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        $categories = category::orderBy('cid')->get();
        $brands = brand::orderBy('bid')->get();
        return view('products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'stock' => 'required|numeric',
            'description' => 'required',
            'photopath' => 'required'
        ]);

        $filename = $request->file('photopath')->getClientOriginalExtension();
        $filename = time().'.'.$filename;
        $request->file('photopath')->move(public_path('images/products'), $filename);
        $data['photopath'] = $filename;

        product::create($data);
        return redirect()->route('product.index')->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = category::orderBy('cid')->get();
        $brands = brand::orderBy('bid')->get();
        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'stock' => 'required|numeric',
            'description' => 'required',
            'photopath' => 'nullable'
        ]);

        if ($request->hasFile('photopath')) {
            $filename = $request->file('photopath')->getClientOriginalExtension();
            $filename = time().'.'.$filename;
            $request->file('photopath')->move(public_path('images/products'), $filename);
            $data['photopath'] = $filename;

            file::delete(public_path('images/products/'.$product->photopath));
        }

        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->id);
        File::delete(public_path('images/products/'.$product->photopath));
        $product->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
}
