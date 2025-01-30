<x-base-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto border rounded-lg shadow-lg p-6">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-t-lg mb-4">
            <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
            <p class="text-lg text-gray-600 mb-2">Prijs: €{{ number_format($product->price, 2) }}</p>
            <p class="text-gray-600 mb-4">Voorraad: {{ $product->stock }}</p>
            <p class="mb-4">{{ $product->description }}</p>

            @if(session('error'))
                <p class="text-red-500">{{ session('error') }}</p>
            @endif

            <form action="{{ route('product.buy', $product) }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-blue-500 text-white rounded-lg py-2 hover:bg-blue-600">Kopen</button>
            </form>
        </div>
    </div>
</x-base-layout>
