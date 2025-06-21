<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $latestProducts = product::latest()->take(4)->get();
        return view('welcome', compact('latestProducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function shop(Request $request)
    {
         $query = product::query();

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by brand
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Sort by price
        if ($request->filled('sort_price')) {
            $direction = $request->sort_price === 'asc' ? 'asc' : 'desc';
            $query->orderBy('price', $direction);
        }

        $AllProducts = $query->paginate(8);
        $categories = \App\Models\category::all();
        $brands = \App\Models\brand::all();

        return view('shop', compact('AllProducts', 'categories', 'brands'));
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function viewProduct($id)
    {
        $product = product::findOrFail($id);
        $relatedproducts = product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();
        return view('viewproduct', compact('product', 'relatedproducts'));
    }

    
    public function checkout($cartid)
    {
        $cart = Cart::findOrFail($cartid);
        return view('checkout', compact('cart'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->latest()->get();
        return view('search', compact('products', 'search'));
    }  
}
