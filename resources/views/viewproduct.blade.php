@extends('layouts.header')
@section('content')
    <div class="mx-auto max-w-screen-xl p-5">
        <div class="grid grid-cols-4 gap-5 mt-5">
            <div class="shadow-md p-2 border bg-white rounded-2xl overflow-hidden w-96 h-80">
                <img src="{{ asset('images/products/' . $product->photopath) }}" 
                    alt="product" 
                    class="w-full h-full object-cover rounded-2xl hover:scale-105 transition duration-300">
            </div>

            <form class="col-span-2 mt-14 mx-24" action="{{route('addtocart')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <h1 class="text-xl font-bold">{{$product->name}}</h1>
                @if($product->discounted_price > 0)
                <p class="text-lg font-bold">Rs. {{$product->discounted_price}} <span class="line-through font-normal text-sm">Rs. {{$product->price}}</span> </p>
                @else
                <p class="text-lg font-bold">Rs. {{$product->price}}</p>
                @endif

                <p class="text-md text-red-600">Stock: {{$product->stock}}</p>

                {{-- Increment and Decrement  --}}
                <div class="flex items-center mt-5 hover:cursor-pointer">
                    <div class="bg-gray-200 px-3 py-2 rounded-l-lg" onclick="decrement()">-</div>
                    <input type="text" name="quantity" value="1" class=" border-none text-center w-12" id="qty" readonly>
                    <div class="bg-gray-200 px-3 py-2 rounded-r-lg" onclick="increment()">+</div>
                </div>

                <div class="flex justify-between mt-5">
                    <button class="bg-teal-600 text-white font-bold px-3 py-2 rounded-lg hover:bg-teal-700">Add to Cart</button>
                </div>
            </form>

            <div class="border-l border-gray-300 pl-4">
                <div class="mt-12">
                    <h2 class="text-2xl font-bold pb-5">Our Services:</h2>
                    <p>🚚 Delivery in 2-5 Days</p>
                    <p>💵 Cash on Delivery</p>
                    <p>🛡️ Secure online Payments</p>
                    <p>🍀 No Harmful Chemicals</p>
                    <p>♻️ Eco-Friendly Packaging</p>
                    <p>🔁 Free Returns</p>
                </div>
            </div>
        </div>

        <div class="mt-10">
            <h1 class="text-2xl font-bold">Description</h1>
            <p class="text-md mt-2">{!! $product->description !!}</p>
        </div>

    </div>

    <div class="pb-5">
        <div class="mx-auto max-w-screen-xl p-5 bg-gray-100">
            <h1 class="text-4xl font-bold mb-5">Related Products</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($relatedproducts as $product)
                <a href="{{ route('viewproduct', $product->id) }}" 
                    class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-2xl transition duration-300 hover:-translate-y-1 relative group border border-teal-200 cursor-pointer">
                    <div class="relative">
                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">

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

    <script>
        function increment()
        {
            if(document.getElementById('qty').value < {{$product->stock}}){
                document.getElementById('qty').value++;
            }
        }

        function decrement()
        {
            if(document.getElementById('qty').value > 1){
                document.getElementById('qty').value--;
            }
        }
    </script>
@endsection
