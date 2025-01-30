<!-- resources/views/home.blade.php -->
<x-base-layout>
    <div class="container mx-auto py-8">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold mb-4">Welkom bij Mijn Webshop</h1>
            <p class="text-lg text-gray-700 mb-4">
                Ontdek geweldige producten tegen onverslaanbare prijzen! Onze webshop biedt een breed scala aan artikelen speciaal voor jou.
            </p>
            <a href="#featured-products" class="inline-block mt-4 bg-blue-500 text-white rounded-lg py-2 px-4 hover:bg-blue-600">Nu Winkelen</a>
        </div>


        <h2 class="text-3xl font-semibold mb-6">Winkelen op Categorieën</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <div class="border rounded-lg shadow-lg p-4 text-center">
                <img src="{{ asset('images/5.jpg') }}" alt="Elektronica" class="w-full h-48 object-cover rounded-t-lg mb-2">
                <h3 class="text-lg font-bold">Elektronica</h3>
                <p class="text-gray-600">Vind de nieuwste gadgets en apparaten.</p>
                <a href="/products/electronics" class="mt-2 inline-block bg-blue-500 text-white rounded-lg py-1 px-2 hover:bg-blue-600">Nu Winkelen</a>
            </div>

            <div class="border rounded-lg shadow-lg p-4 text-center">
                <img src="{{ asset('images/4.jpg') }}" alt="Mode" class="w-full h-48 object-cover rounded-t-lg mb-2">
                <h3 class="text-lg font-bold">Mode</h3>
                <p class="text-gray-600">Ontdek de nieuwste trends en stijlen.</p>
                <a href="/products/fashion" class="mt-2 inline-block bg-blue-500 text-white rounded-lg py-1 px-2 hover:bg-blue-600">Nu Winkelen</a>
            </div>

            <div class="border rounded-lg shadow-lg p-4 text-center">
                <img src="{{ asset('images/6.jpg') }}" alt="Huisgoederen" class="w-full h-48 object-cover rounded-t-lg mb-2">
                <h3 class="text-lg font-bold">Huisgoederen</h3>
                <p class="text-gray-600">Essentials om je leefruimte te verbeteren.</p>
                <a href="/products/home-goods" class="mt-2 inline-block bg-blue-500 text-white rounded-lg py-1 px-2 hover:bg-blue-600">Nu Winkelen</a>
            </div>
        </div>

        <h2 id="featured-products" class="text-3xl font-semibold mb-6">Producten</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
            @foreach($products as $product)
                <div class="border rounded-lg shadow-lg p-4">
                    <div class="w-full h-60 mb-4 overflow-hidden rounded-t-lg bg-gray-100">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-700 mb-2">{{ Str::limit($product->description, 60) }}</p>
                    <p class="text-lg font-semibold text-gray-900 mb-4">€{{ number_format($product->price, 2) }}</p>

                    <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full bg-blue-500 text-white rounded-lg py-2 hover:bg-blue-600">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>



        <h2 class="text-3xl font-semibold mb-6">Wat Onze Klanten Zeggen</h2>
        <div class="space-y-6">
            <div class="border rounded-lg shadow-lg p-4">
                <p class="italic">"Geweldige producten en snelle verzending! Sterk aanbevolen!"</p>
                <p class="text-gray-600 font-semibold">- Jane Doe</p>
            </div>
            <div class="border rounded-lg shadow-lg p-4">
                <p class="italic">"De beste online winkelervaring die ik ooit heb gehad!"</p>
                <p class="text-gray-600 font-semibold">- John Smith</p>
            </div>
            <div class="border rounded-lg shadow-lg p-4">
                <p class="italic">"Geweldige kwaliteit en service! Ik ga hier zeker weer winkelen."</p>
                <p class="text-gray-600 font-semibold">- Emily Johnson</p>
            </div>
        </div>
    </div>
</x-base-layout>
