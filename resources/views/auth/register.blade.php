<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - Farm2Table</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-teal-50">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-xl">
            <h2 class="text-3xl font-extrabold text-teal-800 text-center mb-2">Create an Account</h2>
            <p class="text-center text-teal-600 mb-6">Join the Farm2Table community</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-teal-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Jane Doe">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-teal-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="you@example.com">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-teal-700 mb-1">Phone</label>
                    <input type="text" id="phone" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="123-456-7890">
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-teal-700 mb-1">Address</label>
                    <input type="text" id="address" name="address" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="City, State">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-teal-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="••••••••">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-teal-700 mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-teal-600 text-white py-3 rounded-lg hover:bg-teal-700 transition duration-300">
                    Register
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-teal-600 font-medium hover:underline">Login</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
