<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Farm2Table</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-teal-50">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            <h2 class="text-3xl font-extrabold text-teal-800 text-center mb-6">Welcome Back</h2>
            <p class="text-center text-teal-600 mb-6">Login to continue to Farm2Table</p>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-teal-700 mb-1">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="you@example.com"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-teal-700 mb-1">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="••••••••"
                    >
                </div>

                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="mr-2">
                        <label for="remember" class="text-teal-700">Remember Me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-teal-600 hover:underline">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full bg-teal-600 text-white py-3 rounded-lg hover:bg-teal-700 transition duration-300">
                    Login
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-teal-600 font-medium hover:underline">Register</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
