<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Document') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="My Webshop Logo" class="h-10 w-auto">
            </a>
            <nav class="space-x-4">
                <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="/products" class="text-gray-600 hover:text-gray-800">Products</a>
                <a href="/about" class="text-gray-600 hover:text-gray-800">About Us</a>
                <a href="/contact" class="text-gray-600 hover:text-gray-800">Contact</a>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Log in</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} My Webshop. All rights reserved.</p>
            <p class="mt-4">
                <a href="/privacy" class="text-gray-400 hover:text-white">Privacy Policy</a> |
                <a href="/terms" class="text-gray-400 hover:text-white">Terms of Service</a>
            </p>
        </div>
    </footer>

</body>
</html>
