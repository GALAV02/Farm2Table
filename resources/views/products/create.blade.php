@extends('layouts.app')
@section('title','Add Products')
@section('content')
    <div class="w-full mx-auto bg-white p-4 md:p-6 rounded-lg shadow-md overflow-hidden">
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="border p-2 rounded-lg w-full mt-1">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand</label>
                    <select name="brand_id" id="brand_id" class="border p-2 rounded-lg w-full mt-1">
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" placeholder="Product Name" class="border p-2 rounded-lg w-full mt-1" value="{{old('name')}}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">* {{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="tiny" name="description" placeholder="Enter Description" class="border p-2 rounded-lg w-full mt-1" rows="5">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">* {{$message}}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" id="price" placeholder="Price" class="border p-2 rounded-lg w-full mt-1" value="{{old('price')}}">
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label for="discounted_price" class="block text-sm font-medium text-gray-700">Discounted Price</label>
                    <input type="text" name="discounted_price" id="discounted_price" placeholder="Enter discounted Price" class="border p-2 rounded-lg w-full mt-1" value="{{ old('discounted_price') }}">
                    @error('discounted_price')
                        <p class="text-red-500 text-sm mt-1">* {{$message}}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="text" name="stock" id="stock" placeholder="Stock" class="border p-2 rounded-lg w-full mt-1" value="{{old('stock')}}">
                @error('stock')
                    <p class="text-red-500 text-sm mt-1">* {{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="photopath" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" name="photopath" id="photopath" class="border p-2 rounded-lg w-full mt-1">
                @error('photopath')
                    <p class="text-red-500 text-sm mt-1">* {{$message}}</p>
                @enderror
            </div>

            <div class="flex justify-center space-x-4">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full">Add Product</button>
                <a href="{{route('product.index')}}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js" integrity="sha512-bib7srucEhHYYWglYvGY+EQb0JAAW0qSOXpkPTMgCgW8eLtswHA/K4TKyD4+FiXcRHcy8z7boYxk0HTACCTFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny',
            plugins: 'lists link image preview code',
        });
    </script>
@endsection