@extends('layouts.header')
@section('content')
    <div class="mx-auto max-w-screen-xl p-5">
        <h1 class="font-bold text-3xl mb-5">Checkout</h1>
        <div class="shadow-lg p-4 grid gap-6 justify-between items-center border rounded-lg">
            <div class="flex gap-4">
                <img src="{{asset('images/products/'.$cart->product->photopath)}}" alt="" class="h-32 w-32 object-cover">
                <div class="mt-6">
                    <h1 class="font-bold text-xl">{{$cart->product->name}}</h1>
                    <p class="text-gray-500">
                        @if($cart->product->discounted_price)
                            <span class="text-red-600 font-bold text-lg">
                                Rs. {{$cart->product->discounted_price}}
                            </span>
                            <span class="text-gray-500 line-through">
                                Rs. {{$cart->product->price}}
                            </span>
                        @else
                            <span class="text-red-600 font-bold text-lg">
                                Rs. {{$cart->product->price}}
                            </span>
                        @endif
                    </p>
                    <p class="text-gray-500">Quantity: {{$cart->quantity}}</p>
                </div>
            </div>
            <div class="grid gap-4">
                {{-- Esewa here  --}}
                <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                    <input type="hidden" id="amount" name="amount" value="100" required>
                    <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                    <input type="hidden" id="total_amount" name="total_amount" value="110" required>
                    <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
                    <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                    <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                    <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                    <input type="hidden" id="success_url" name="success_url" value="{{route('order.store',$cart->id)}}" required>
                    <input type="hidden" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
                    <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                    <input type="hidden" id="signature" name="signature" value="i94zsd3oXF6ZsSr/kGqT4sSzYQzjj1W/waxjWyRwaME=" required>
                    <input value="Pay with eSewa" type="submit" class="bg-green-500 hover:bg-green-600 block text-center text-white px-4 py-2 rounded-lg">
                </form>
            </div>
        </div>
    </div>

    @php
        $price = $cart->product->discounted_price ?? $cart->product->price;
        $total_amount = $price * $cart->quantity;
        $transaction_uuid = time();
        $secret = '8gBm/:&EnhH.1/q';
        $message = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
        $s = hash_hmac('sha256', $message, $secret, true);
        $signature = base64_encode($s);
    @endphp

    <script>
        document.getElementById('amount').value = {{$total_amount}};
        document.getElementById('total_amount').value = {{$total_amount}};
        document.getElementById('transaction_uuid').value = '{{$transaction_uuid}}';
        document.getElementById('signature').value = '{{$signature}}';
    </script>
@endsection