@extends('layouts.header')
@section('content')
<div class="max-w-5xl mx-auto py-10">
    <h2 class="text-3xl font-extrabold mb-8 text-teal-800">My Orders</h2>
    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white rounded">
            <thead class="bg-teal-400">
                <tr>
                    <th class="py-3 px-4 border-b text-left">Product</th>
                    <th class="py-3 px-4 border-b text-left">Quantity</th>
                    <th class="py-3 px-4 border-b text-left">Price</th>
                    <th class="py-3 px-4 border-b text-left">Total Price</th>
                    <th class="py-3 px-4 border-b text-left">Status</th>
                    <th class="py-3 px-4 border-b text-left">Payment Method</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                @php
                    $product = $order->product;
                    $unitPrice = $product && $product->discounted_price > 0 ? $product->discounted_price : ($product->price ?? 0);
                    $total = $unitPrice * $order->quantity;
                @endphp
                <tr class="hover:bg-teal-50">
                    <td class="py-2 px-4 border-b">{{ $product->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">{{ $order->quantity }}</td>
                    <td class="py-2 px-4 border-b">
                        @if($product && $product->discounted_price > 0)
                            <span class="line-through text-gray-400">Rs. {{ $product->price }}</span>
                            <span class="text-teal-700 font-bold ml-1">Rs. {{ $product->discounted_price }}</span>
                        @else
                            <span class="text-teal-700 font-bold">Rs. {{ $product->price ?? 0 }}</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b font-semibold text-teal-900">Rs. {{ $total }}</td>
                    <td class="py-2 px-4 border-b">{{ $order->status }}</td>
                    <td class="py-2 px-4 border-b">{{ $order->payment_method }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-4 text-center text-gray-500">You have no orders yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection