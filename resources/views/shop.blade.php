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

          <!-- Sort & Filter Form -->
        <form method="GET" action="{{ route('shop') }}" class="flex flex-wrap gap-4 justify-center mb-10 items-end bg-white p-4 rounded-xl shadow-md">
            <div>
                <label for="category_id" class="block text-teal-700 font-semibold mb-1">
                    <i class="fas fa-list mr-1"></i>Category
                </label>
                <select name="category_id" id="category_id" class="border border-teal-300 rounded px-3 py-2 min-w-[150px]">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="brand_id" class="block text-teal-700 font-semibold mb-1">
                    <i class="fas fa-industry mr-1"></i>Brand
                </label>
                <select name="brand_id" id="brand_id" class="border border-teal-300 rounded px-3 py-2 min-w-[150px]">
                    <option value="">All Brands</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="sort_price" class="block text-teal-700 font-semibold mb-1">
                    <i class="fas fa-sort-amount-down mr-1"></i>Sort by Price
                </label>
                <select name="sort_price" id="sort_price" class="border border-teal-300 rounded px-3 py-2 min-w-[150px]">
                    <option value="">Default</option>
                    <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Low to High</option>
                    <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>High to Low</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold px-6 py-2 rounded shadow transition">
                    <i class="fas fa-filter mr-2"></i>Apply
                </button>
            </div>
        </form>

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
