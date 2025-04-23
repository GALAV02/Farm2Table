@extends('layouts.header')
@section('content')
    <div class="bg-gradient-to-r from-green-100 via-lime-50 to-teal-100 py-5">
        <div class="mx-auto max-w-screen-xl p-5 flex justify-center items-center flex-col">
            <h1 class="text-5xl font-extrabold text-teal-900">Welcome to Farm2Table</h1>
            <p class="text-lg text-teal-700 mt-2">Bringing Freshness Straight from the Farm to Your Table!</p>
            <a href="{{route('shop')}}" class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 px-4 rounded mt-4 shadow-lg">
            <i class="fas fa-shopping-cart mr-2"></i> Shop Now
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-r from-green-200 via-lime-100 to-teal-200 py-5">
        <div class="mx-auto max-w-screen-xl p-5">
            <div class="bg-teal-50 rounded-lg shadow-lg border-teal-200 border p-5 flex flex-col md:flex-row md:space-x-5 transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="justify-center items-center flex flex-col">
                    <h2 class="text-3xl font-bold text-teal-800 mb-4 text-center">Explore Our Fresh Products</h2>
                    
                    <ul class="list-disc list-inside text-teal-600 mb-6 text-md">
                        <li>100% organic and fresh.</li>
                        <li>Direct from Local Farmers.</li>
                        <li>High-quality dairy products.</li>
                        <li>Sustainable & Eco-Friendly.</li>
                        <li>Seasonal fruits and veggies..</li>
                        <li>Affordable premium quality.</li>
                        <li>Convenient online shopping.</li>
                        <li>Support for local farmers.</li>
                    </ul>

                    <div class="bg-white rounded-lg p-2 shadow-md border-l-4 border-teal-400 max-w-md text-left">
                        <h3 class="text-xl font-semibold text-teal-800 mb-2">Freshness Guaranteed!</h3>
                        <p class="text-teal-600 text-md">
                            We pride ourselves on delivering only the freshest, organic products straight to your doorstep. Our farm-to-table promise ensures that every product you receive is top-quality and freshly picked.
                        </p>
                    </div>
                </div>
                
                <div class="w-full flex justify-center items-center">
                    <video class="w-full max-w-4xl rounded-lg shadow-lg" controls autoplay muted loop>
                        <source src="{{asset('img/ads.mp4')}}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-green-100 via-lime-50 to-teal-100 py-10">
        <div class="mx-auto max-w-screen-xl px-6">
            <h2 class="text-4xl font-extrabold text-teal-900 mb-10 text-center tracking-wide">🛍️ Latest Arrivals</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($latestProducts as $product)
                <a href="{{ route('viewproduct', $product->id) }}" class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-2xl transition duration-300 hover:-translate-y-1 relative group border border-teal-200 cursor-pointer">
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

                    <div class="p-4 space-y-2">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
                        
                        <div class="flex items-center justify-between">
                            @if($product->discounted_price > 0)
                            <p class="text-teal-700 text-lg font-bold">
                                Rs.{{ $product->discounted_price }}
                                <span class="line-through text-sm text-gray-500 ml-2">Rs.{{ $product->price }}</span>
                            </p>
                            @else
                            <p class="text-gray-800 text-lg font-bold">Rs.{{ $product->price }}</p>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-r from-green-200 via-lime-100 to-teal-200 py-12">
        <div class="mx-auto max-w-screen-xl px-6 text-center">
            <h2 class="text-4xl font-extrabold text-teal-900 mb-10 tracking-wide">🌿 Why Choose Us?</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-md border border-teal-300 p-6 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <img src="{{ asset('img/quality.jpg') }}" alt="Quality Products" 
                        class="w-full h-48 object-cover rounded-xl mb-5 shadow-sm">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-2 flex items-center justify-center gap-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Quality Products
                    </h3>
                    <p class="text-gray-700 leading-relaxed">We offer premium quality produce straight from trusted local farmers to your table.</p>
                </div>

                <div class="bg-white rounded-2xl shadow-md border border-teal-300 p-6 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <img src="{{ asset('img/eco.jpg') }}" alt="Eco-Friendly" 
                        class="w-full h-48 object-cover rounded-xl mb-5 shadow-sm">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-2 flex items-center justify-center gap-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 00-6.3 17.6c.5.1.7-.2.7-.5v-2c-2.9.6-3.5-1.3-3.5-1.3-.4-1-.9-1.3-.9-1.3-.7-.5.1-.5.1-.5.8.1 1.3.8 1.3.8.7 1.3 1.8.9 2.2.7.1-.5.3-.9.5-1.1-2.3-.3-4.7-1.1-4.7-5a4 4 0 011-2.8 3.6 3.6 0 01.1-2.8s.8-.2 2.8 1a9.6 9.6 0 015 0c2-.9 2.8-1 2.8-1a3.6 3.6 0 01.1 2.8 4 4 0 011 2.8c0 3.9-2.5 4.7-4.9 5 .3.3.6.8.6 1.6v2.4c0 .3.2.6.7.5A10 10 0 0012 2z"/>
                        </svg>
                        Eco-Friendly
                    </h3>
                    <p class="text-gray-700 leading-relaxed">All our products are eco-conscious, with sustainable farming and packaging practices.</p>
                </div>

                <div class="bg-white rounded-2xl shadow-md border border-teal-300 p-6 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <img src="{{ asset('img/delivery.jpg') }}" alt="Fast Delivery" 
                        class="w-full h-48 object-cover rounded-xl mb-5 shadow-sm">
                    <h3 class="text-2xl font-semibold text-teal-800 mb-2 flex items-center justify-center gap-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 10h11l3-6h7v6h-4v5h-2v-5H3v9h4a3 3 0 006 0h4a3 3 0 006 0h-2a1 1 0 00-2 0 1 1 0 01-2 0 1 1 0 00-2 0H3v-9z"/>
                        </svg>
                        Fast Delivery
                    </h3>
                    <p class="text-gray-700 leading-relaxed">Get your orders delivered lightning-fast with our reliable delivery network.</p>
                </div>
            </div>
        </div>
    </div>
@endsection