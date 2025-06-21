@extends('layouts.app')
@section('title', 'Brands')
@section('content')
    <div class="flex justify-start my-5">
        <a onclick="showPopup()" class="flex items-center bg-gradient-to-r from-green-500 to-teal-500 text-white text-lg font-bold px-4 py-2 rounded-full shadow-md hover:from-green-500 hover:to-teal-600 transition duration-200 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Brand
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg mt-6 p-6">
        <table class="w-full text-center border-collapse cursor-pointer">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border-b-2 p-4">B.id</th>
                    <th class="border-b-2 p-4">Brand Name</th>
                    <th class="border-b-2 p-4">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($brands as $brand)
                <tr class="hover:bg-lime-50 hover:shadow-md transition-all duration-300">
                    <td class="border-b p-4 font-medium text-gray-700">{{$brand->bid}}</td>
                    <td class="border-b p-4 text-gray-600">{{$brand->name}}</td>
                    <td class="border-b p-4 text-gray-600">
                        <a onclick="showEditPopup('{{$brand->id}}', '{{$brand->bid}}', '{{$brand->name}}')" class="font-bold text-green-500 hover:text-green-600 hover:underline transition duration-200 mr-2">
                            Edit
                        </a>

                        <a onclick="showDeletePopup('{{$brand->id}}')" class="font-bold text-red-500 hover:text-red-600 hover:underline transition duration-200">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="popup" class="fixed inset-0 bg-gray-600 bg-opacity-60 backdrop-blur-sm items-center justify-center hidden">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add New Brand
                    </h3>
                    <button onclick="hidePopup()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form action="{{route('brand.store')}}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="bid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand ID :</label>
                            <input type="number" name="bid" id="bid" value="{{$nextBid}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter category id" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand Name :</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter category name" required>
                        </div>
                    </div>

                    <div class="flex justify-center mt-5">
                        <button type="submit" class="text-white inline-flex items-center bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add new brand
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

    <div id="popup-edit" class="fixed inset-0 bg-gray-600 bg-opacity-60 backdrop-blur-sm items-center justify-center hidden">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Brands
                    </h3>
                    <button onclick="hideEditPopup()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form action="{{route('brand.update')}}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="bid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand ID :</label>
                            <input type="number" name="bid" id="edit_bid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter category id">
                            @error('bid')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand Name :</label>
                            <input type="text" name="name" id="edit_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter category name">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" name="id" id="updateid">
                    <div class="flex justify-center mt-5">
                        <button type="submit" class="text-white inline-flex items-center bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Edit brand
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
                <form action="{{route('brand.destroy')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="deleteid">
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this brand?</h3>
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
        function showPopup() {
            document.getElementById("popup").style.display = "flex";
        }

        function hidePopup() {
            document.getElementById("popup").style.display = "none";
        }

        function showEditPopup(id, bid, name) {
            document.getElementById("updateid").value = id;
            document.getElementById("edit_bid").value = bid;
            document.getElementById("edit_name").value = name;
            document.getElementById("popup-edit").style.display = "flex";
        }

        function hideEditPopup() {
            document.getElementById("popup-edit").style.display = "none";
        }

        function showDeletePopup(a) {
            document.getElementById("deleteid").value = a;
            document.getElementById("popup-modal").style.display = "flex";
        }

        function hideDeletePopup() {
            document.getElementById("popup-modal").style.display = "none";
        }
    </script>
@endsection