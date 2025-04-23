@extends('layouts.header')
@section('content')
    <div class="mx-auto max-w-screen-xl px-5 py-10">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 border-gray-300 border-b pb-4 flex items-center gap-2">
        <i class="fa fa-search"></i> Searched Products
        </h1>

        <!-- Handle empty product list -->
        @if($products->isEmpty())
            <p class="text-xl text-center text-gray-600 py-28">No products found. Please try searching again.</p>
        @else
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <a href="{{ route('viewproduct', $product->id) }}" 
                       class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-2xl transition duration-300 hover:-translate-y-1 relative group border border-teal-200 cursor-pointer">
                        <div class="relative">
                            <img src="{{ asset('images/products/' . $product->photopath) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover group-hover:scale-105 transition duration-300 rounded-t-lg">
                            @if($product->discounted_price > 0)
                                <span class="absolute top-2 right-2 bg-red-500 text-white text-xs px-3 py-1 rounded-full shadow-lg">
                                    {{ round((($product->price - $product->discounted_price) / $product->price) * 100) }}% OFF
                                </span>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-teal-800">{{ $product->name }}</h3>
                            
                            <!-- Add product ratings (if available) -->
                            @if($product->rating)
                                <div class="flex items-center space-x-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $i < $product->rating ? 'currentColor' : 'none' }}" viewBox="0 0 20 20" class="w-4 h-4 text-yellow-500">
                                            <path d="M10 15l-5.878 3.09 1.136-6.598-4.819-4.695 6.574-.548L10 1l2.987 5.249 6.574.548-4.819 4.695 1.136 6.598L10 15z"/>
                                        </svg>
                                    @endfor
                                </div>
                            @endif
                            
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
        @endif
    </div>
@endsection
