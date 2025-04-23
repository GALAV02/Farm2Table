@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl hover:scale-105 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <p class="text-4xl font-bold text-lime-500 mt-4">{{ number_format($totalUsers) }}</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl hover:scale-105 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
            <p class="text-4xl font-bold text-lime-500 mt-4">{{ number_format($totalOrders) }}</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl hover:scale-105 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-700">Total Products</h3>
            <p class="text-4xl font-bold text-lime-500 mt-4">{{ number_format($totalProducts) }}</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl hover:scale-105 transition-transform duration-300">
            <h3 class="text-lg font-semibold text-gray-700">Revenue</h3>
            <p class="text-4xl font-bold text-lime-500 mt-4">Rs. {{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>
@endsection