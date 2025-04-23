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

    public function shop()
    {
        $AllProducts = product::latest()->paginate(8);
        return view('shop', compact('AllProducts'));
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
