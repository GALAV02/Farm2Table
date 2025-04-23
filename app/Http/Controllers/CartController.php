<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
       $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $data['user_id'] = Auth::user()->id;
        $check = Cart::where('user_id', Auth::user()->id)->where('product_id', $data['product_id'])->first();
        if ($check) 
        {
            return redirect()->back()->with('success', 'Product already in cart!');
        }

        Cart::create($data);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function mycart()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('mycart', compact('carts'));
    }

    public function destroy(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) 
        {
            $cart->delete();
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
        return redirect()->back()->with('success', 'Product not found in cart!');
    }
}
