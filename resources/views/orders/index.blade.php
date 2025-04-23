@extends('layouts.app')
@section('title', 'Orders')
@section('content')
    <div class="bg-white shadow-lg rounded-lg mt-6 p-6">
        <table class="w-full text-center border-collapse cursor-pointer">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border-b-2 p-4">Order Date</th>
                    <th class="border-b-2 p-4">Image</th>
                    <th class="border-b-2 p-4">Product Name</th>
                    <th class="border-b-2 p-4">Customer Name</th>
                    <th class="border-b-2 p-4">Address</th>
                    <th class="border-b-2 p-4">Phone</th>
                    <th class="border-b-2 p-4">Quantity</th>
                    <th class="border-b-2 p-4">Rate</th>
                    <th class="border-b-2 p-4">Total</th>
                    <th class="border-b-2 p-4">Status</th>
                    <th class="border-b-2 p-4">Action</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($orders as $order)
                <tr class="hover:bg-lime-50 hover:shadow-md transition-all duration-300">
                    <td class="border-b p-4 font-medium text-gray-700">{{$order->created_at}}</td>
                    <td class="border-b p-4 text-gray-600">
                        <div class="w-full flex justify-center">
                            <img src="{{ asset('images/products/'.$order->product->photopath) }}" alt="product-image" class="h-20 object-contain">
                        </div>
                    </td>
                    <td class="border-b p-4 text-gray-600">{{$order->product->name}}</td>
                    <td class="border-b p-4 text-gray-600">{{$order->name}}</td>
                    <td class="border-b p-4 text-gray-600">{{$order->address}}</td>
                    <td class="border-b p-4 text-gray-600">{{$order->phone}}</td>
                    <td class="border-b p-4 text-gray-600">{{$order->quantity}}</td>
                    <td class="border-b p-4 text-gray-600">{{$order->price}}</td>
                    <td class="border-b p-4 text-gray-600">{{$order->price * $order->quantity}}</td>
                    <td class="border-b p-4 text-gray-600">{{$order->status}}</td>
                    <td class="border-b p-4 text-gray-600 grid gap-2 grid-cols-2">
                        <a href="{{route('order.status',[$order->id,'Pending'])}}" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg">Pending</a>
                        <a href="{{route('order.status',[$order->id,'Processing'])}}" class="bg-yellow-500 text-white px-3 py-1.5 rounded-lg">Processing</a>
                        <a href="{{route('order.status',[$order->id,'Delivered'])}}" class="bg-green-500 text-white px-3 py-1.5 rounded-lg">Delivered</a>
                        <a href="{{route('order.status',[$order->id,'Rejected'])}}" class="bg-red-500 text-white px-3 py-1.5 rounded-lg">Rejected</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection