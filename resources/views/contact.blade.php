@extends('layouts.header')
@section('content')
<div class="mx-auto max-w-screen-xl px-5 py-10">
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-teal-900">Contact Us</h1>
        <p class="text-lg text-teal-700 mt-3">We're here to help — reach out anytime.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-5">
        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-teal-800 mb-2">Get in Touch</h2>
            <p class="text-gray-700 text-lg">
                Have questions, feedback, or need assistance? Fill out the form or reach us directly using the info below.
            </p>
            <div class="space-y-4">
                <div class="flex items-start gap-4">
                    <i class="fas fa-map-marker-alt text-teal-600 text-xl"></i>
                    <p>Gaindakot-1, Nawalpur</p>
                </div>
                <div class="flex items-start gap-4">
                    <i class="fas fa-phone-alt text-teal-600 text-xl"></i>
                    <p>987 654 3210</p>
                </div>
                <div class="flex items-start gap-4">
                    <i class="fas fa-envelope text-teal-600 text-xl"></i>
                    <p>support@farm2table.com</p>
                </div>
            </div>

            <div class="bg-teal-50 p-7 rounded-xl shadow-sm">
                <h2 class="text-2xl font-bold text-teal-800 mb-4">Our Commitment to You</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    At Farm2Table, we believe in fresh, ethical, and sustainable food. Whether it's a product inquiry or feedback on your order, our team is dedicated to providing prompt, helpful, and friendly support. Your satisfaction means the world to us.
                </p>
            </div>
        </div>

        <div>
            <form action="{{route('contact.submit')}}" method="POST" class="space-y-5 bg-white p-6 rounded-xl shadow-md">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Your Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Your Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Your Message</label>
                    <textarea name="message" rows="5" required placeholder="Type your message..." class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-teal-600 text-white px-6 py-3 rounded-md hover:bg-teal-700 transition duration-300">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
