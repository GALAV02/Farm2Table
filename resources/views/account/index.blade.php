@extends('layouts.header')
@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800">My Account</h1>
        <p class="text-lg text-gray-500 mt-2">Manage your profile information</p>
    </div>

    {{-- Account Overview Card --}}
    <div class="bg-white shadow-md rounded-xl p-6 mb-10 border border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Account Overview</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-600">
            <div>
                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            </div>
            <div>
                <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                <p><strong>Joined:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Edit Profile</h2>

        <form action="{{ route('account.update') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" 
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" 
                    class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <div class="text-right">
                <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-teal-700 transition">Update Profile</button>
            </div>
        </form>
    </div>

    <div class="mt-12 bg-red-50 border border-red-200 text-red-800 rounded-xl p-6">
        <h2 class="text-2xl font-semibold mb-4">Delete Account</h2>
        <p class="mb-4">Once you delete your account, all your data will be permanently removed. This action cannot be undone.</p>

        <form action="{{ route('account.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
            @csrf
            <button type="submit" class="bg-red-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-700 transition">
                Delete My Account
            </button>
        </form>
    </div>
</div>
@endsection
