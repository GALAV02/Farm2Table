@extends('layouts.header')
@section('content')
    <div class="mx-auto max-w-screen-xl px-5 py-10 bg-gray-100">
        <!-- Header Section -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-teal-700 uppercase tracking-wide">
                Our Shop
            </h1>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                Welcome to our shop! Explore a variety of fresh, high-quality products.
            </p>
            <div class="mt-6 flex justify-center">
                <div class="w-24 h-1 bg-teal-500 rounded-full"></div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($AllProducts as $product)
            <a href="{{ route('viewproduct', $product->id) }}" 
               class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-2xl transition duration-300 hover:-translate-y-1 relative group border border-teal-200 cursor-pointer">
                <div class="relative">
                    <img src="{{ asset('images/products/' . $product->photopath) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                    @if($product->discounted_price > 0)
                    <span class="absolute top-2 right-2 bg-red-500 text-white text-xs px-3 py-1 rounded-full shadow-lg">
                        {{ round((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                    </span>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-teal-800">{{ $product->name }}</h3>
                    @if($product->discounted_price > 0)
                    <p class="text-sm text-gray-600 line-through">Rs. {{ $product->price }}</p>
                    <p class="text-lg font-bold text-teal-600">Rs. {{ $product->discounted_price }}</p>
                    @else
                    <p class="text-lg font-bold text-teal-600">Rs. {{ $product->price }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        <div class="flex justify-center mt-10">
            {{ $AllProducts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
