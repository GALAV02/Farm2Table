<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-lime-100">
        @include('layouts.alert')
        <div class="flex">
            <div class="w-56 h-screen bg-teal-500 border-gray-200 dark:bg-teal-700 fixed">
                <img src="{{asset('img/f2t-c.png')}}" alt="logo" class="w-3/4 mx-auto mt-8">
                <div class="mt-8 grid">
                    <a href="{{route('home') }}" class="flex items-center w-full transition duration-75 rounded-lg pl-11 text-white hover:bg-teal-600 p-4">
                        <i class="fas fa-home text-lg"></i>
                        <span class="ml-4 text-lg">Main Website</span>
                    </a>

                    <a href="{{route('dashboard')}}" class="flex items-center w-full transition duration-75 rounded-lg pl-11 text-white hover:bg-teal-600 p-4">
                        <i class="fas fa-tachometer-alt text-lg"></i>
                        <span class="ml-4 text-lg">Dashboard</span>
                    </a>

                    <a href="{{route('category.index')}}" class="flex items-center w-full transition duration-75 rounded-lg pl-11 py-5 text-white hover:bg-teal-600 p-4">
                        <i class="fas fa-th-list text-lg"></i>
                        <span class="ml-4 text-lg">Categories</span>
                    </a>

                    <a href="{{route('brand.index')}}" class="flex items-center w-full transition duration-75 rounded-lg pl-11 py-5 text-white hover:bg-teal-600 p-4">
                        <i class="fas fa-tags text-lg"></i>
                        <span class="ml-4 text-lg">Brands</span>
                    </a>

                    <a href="{{route('product.index')}}" class="flex items-center w-full transition duration-75 rounded-lg pl-11 py-5 text-white hover:bg-teal-600 p-4">
                        <i class="fas fa-box text-lg"></i>
                        <span class="ml-4 text-lg ">Products</span>
                    </a>

                    <a href="{{route('order.index')}}" class="flex items-center w-full transition duration-75 rounded-lg pl-11 py-5 text-white hover:bg-teal-600 p-4">
                        <i class="fas fa-shopping-cart text-lg"></i>
                        <span class="ml-4 text-lg">Orders</span>
                    </a>

                    <a href="{{route('user.index')}}" class="flex items-center w-full transition duration-75 rounded-lg pl-11 py-5 text-white hover:bg-teal-600 p-4">
                        <i class="fas fa-users text-lg"></i>
                        <span class="ml-4 text-lg">Users</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="flex items-center w-full transition duration-75 rounded-lg pl-11 py-5 text-white hover:bg-teal-600 p-4 text-left">
                            <i class="fas fa-sign-out-alt text-lg"></i>
                            <span class="ml-4 text-lg">Logout</span>
                        </button>
                    </form>
                    
                    <p class="text-white text-center mt-48">&copy; {{ date('Y') }} F2T. All rights reserved.</p>
                </div>
            </div>
            <div class="p-4 flex-1 ml-56">
                <div class="flex justify-between items-center">
                    <h2 class="text-3xl font-bold">@yield('title')</h2>
                    @auth
                    <div class="flex items-center font-bold text-lg">
                        <i class="fa fa-user-circle mr-2 text-xl"></i>
                        {{ Auth::user()->name }}
                    </div>
                    @endauth
                </div>
                <hr class="h-1 bg-teal-600 my-3">
                <div class="mt-4">
                    @yield('content')   
                </div>
            </div>
        </div>
    </body>
</html>