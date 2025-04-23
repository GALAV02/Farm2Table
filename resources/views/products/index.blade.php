@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <div class="flex justify-start my-5">
        <a href="{{ route('product.create') }}" class="flex items-center bg-gradient-to-r from-green-500 to-teal-500 text-white text-lg font-bold px-4 py-2 rounded-full shadow-md hover:from-green-500 hover:to-teal-600 transition duration-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Product
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg mt-6 p-6">
        <table class="w-full text-center border-collapse cursor-pointer">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border-b-2 p-4">S.N.</th>
                    <th class="border-b-2 p-4">Image</th>
                    <th class="border-b-2 p-4">Product Name</th>
                    <th class="border-b-2 p-4">Category</th>
                    <th class="border-b-2 p-4">Brand</th>
                    <th class="border-b-2 p-4">Price</th>
                    <th class="border-b-2 p-4">Stock</th>
                    <th class="border-b-2 p-4">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr class="hover:bg-lime-50 hover:shadow-md transition-all duration-300">
                    <td class="border-b p-4 font-medium text-gray-700">{{$loop->iteration}}</td>
                    <td class="border-b p-4 text-gray-600">
                        <img src="{{asset('images/products/'.$product->photopath)}}" alt="img" class="w-16 h-16 rounded-lg mx-auto">
                    </td>
                    <td class="border-b p-4 text-gray-600">{{$product->name}}</td>
                    <td class="border-b p-4 text-gray-600">{{$product->category->name}}</td>
                    <td class="border-b p-4 text-gray-600">{{$product->brand->name}}</td>
                    <td class="border-b p-4 text-gray-600">Rs.{{$product->price}}</td>
                    <td class="border-b p-4 text-gray-600">{{$product->stock}}</td>
                    <td class="border-b p-4 text-gray-600">
                        <a href="{{route('product.edit',$product->id)}}" class="font-bold text-green-500 hover:text-green-600 hover:underline transition duration-200 mr-2">
                            Edit
                        </a>
                        <a onclick="showDeletePopup('{{$product->id}}')" class="font-bold text-red-500 hover:text-red-600 hover:underline transition duration-200">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="popup-modal" class="fixed inset-0 bg-gray-600 bg-opacity-60 backdrop-blur-sm items-center justify-center hidden">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <button onclick="hideDeletePopup()" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form action="{{route('product.destroy')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="deleteid">
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to remove this product?</h3>
                        <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button onclick="hideDeletePopup()" data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showDeletePopup(a){
            document.getElementById('deleteid').value = a;
            document.getElementById('popup-modal').classList.remove('hidden');
            document.getElementById('popup-modal').classList.add('flex');
        }

        function hideDeletePopup(){
            document.getElementById('popup-modal').classList.remove('flex');
            document.getElementById('popup-modal').classList.add('hidden');
        }
    </script>
@endsection