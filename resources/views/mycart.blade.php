@extends('layouts.header')
@section('content')
    <div class="mx-auto max-w-screen-xl px-5 py-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 border-gray-300 border-b pb-4 flex items-center gap-2">
            🛒 <span>My Cart</span>
        </h1>

        @if(count($carts) > 0)
        <div class="grid gap-6">
            @php $total = 0; @endphp
            @foreach ($carts as $cart)
                @php
                    $price = $cart->product->discounted_price ?? $cart->product->price;
                    $total += $price * $cart->quantity;
                @endphp
                <div class="bg-white shadow-md rounded-lg p-5 flex flex-col md:flex-row md:items-center justify-between">
                    <div class="flex items-center gap-6">
                        <img src="{{ asset('images/products/' . $cart->product->photopath) }}" alt="{{ $cart->product->name }}" class="w-28 h-28 object-cover rounded">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800">{{ $cart->product->name }}</h2>
                            <div class="text-lg mt-2">
                                @if($cart->product->discounted_price)
                                    <span class="text-red-600 font-bold">Rs. {{ $cart->product->discounted_price }}</span>
                                    <span class="line-through text-gray-400 ml-2">Rs. {{ $cart->product->price }}</span>
                                @else
                                    <span class="text-red-600 font-bold">Rs. {{ $cart->product->price }}</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Quantity: {{ $cart->quantity }}</p>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 flex flex-col items-center gap-3">
                        <a href="{{route('checkout',$cart->id)}}" class="bg-teal-600 hover:bg-teal-700 text-white px-6 py-2 rounded-md w-full text-center font-bold">Order Now</a>
                        <form action="{{route('cart.destroy')}}" method="POST" class="w-full">
                            @csrf
                            <input type="hidden" name="id" value="{{ $cart->id }}">
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md w-full font-bold">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach

            {{-- Total Section --}}
            <div class="bg-white shadow-md rounded-lg p-5 flex justify-between items-center mt-6">
                <h2 class="text-2xl font-bold text-gray-800">Total:</h2>
                <p class="text-2xl text-green-600 font-bold">Rs. {{ $total }}</p>
            </div>
        </div>
        @else
            <div class="text-center py-20">
                <h2 class="text-2xl font-semibold text-gray-600">Your cart is empty 🛒</h2>
                <a href="{{ route('shop') }}" class="mt-4 inline-block bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-md">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection
