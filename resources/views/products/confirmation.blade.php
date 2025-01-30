<x-base-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto border rounded-lg shadow-lg p-6 text-center">
            <h2 class="text-2xl font-bold mb-4">Aankoop Bevestigd</h2>
            <p class="text-lg mb-4">Je hebt succesvol <strong>{{ $product->name }}</strong> gekocht!</p>
            <p class="text-gray-600 mb-4">Nieuwe voorraad: {{ $product->stock }}</p>
            <a href="/" class="text-blue-500 hover:underline">Terug naar de homepage</a>
        </div>
    </div>
</x-base-layout>
