<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Document') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="My Webshop Logo" class="h-10 w-auto">
            </a>

            <nav class="space-x-4 flex items-center">
                <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="/products" class="text-gray-600 hover:text-gray-800">Products</a>
                <a href="/about" class="text-gray-600 hover:text-gray-800">About Us</a>
                <a href="/contact" class="text-gray-600 hover:text-gray-800">Contact</a>
                <a href="{{ route('orders.my_orders') }}" class="text-gray-600 hover:text-gray-800" >My Orders</a>

                @if (Auth::check())
                    @if (Auth::user()->isAdmin())
                        <a href="{{ route('admin.sales') }}" class="text-gray-600 hover:text-gray-800">Admin Sales</a>
                    @endif

                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <button @click="open = !open" class="text-gray-600 hover:text-gray-800">
                            {{ Auth::user()->name }}
                            <svg class="inline h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 10l6 6 6-6" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg">
                            <div class="py-1">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log Out</a>
                            </div>
                        </div>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Log in</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
                @endif
                <a href="{{ route('cart.index') }}" class="relative text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m4-9h10m0 0l2-5M16 16a2 2 0 10-4 0 2 2 0 004 0z" />
                    </svg>
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

            </nav>
        </div>
    </header>



    <main class="container mx-auto px-6 py-8">
        {{ $slot }}
    </main>


</body>

<footer class="bg-gray-800 text-white py-6 mt-12">
    <div class="container mx-auto px-6 text-center">
        <p>&copy; {{ date('Y') }} My Webshop. All rights reserved.</p>
        <p class="mt-4">
            <a href="/privacy" class="text-gray-400 hover:text-white">Privacy Policy</a> |
            <a href="/terms" class="text-gray-400 hover:text-white">Terms of Service</a>
        </p>
    </div>
</footer>
</html>
