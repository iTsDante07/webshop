<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Verkoop een Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-lg font-semibold">Productnaam</label>
                <input type="text" name="name" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-lg font-semibold">Beschrijving</label>
                <textarea name="description" class="w-full p-2 border rounded"></textarea>
            </div>
            <div>
                <label class="block text-lg font-semibold">Prijs</label>
                <input type="number" name="price" step="0.01" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-lg font-semibold">Voorraad</label>
                <input type="number" name="stock" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-lg font-semibold">Afbeelding</label>
                <input type="file" name="image" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded-lg py-2 px-4 hover:bg-blue-600">Plaats Product</button>
        </form>
    </div>
</x-base-layout>
