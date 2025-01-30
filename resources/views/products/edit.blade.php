<!-- resources/views/products/edit.blade.php -->
<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Product</h1>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-4 py-2" value="{{ $product->name }}" required>
            </div>
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mb-4">
            @endif
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border rounded px-4 py-2">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input type="number" name="price" id="price" class="w-full border rounded px-4 py-2" value="{{ $product->price }}" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full border rounded px-4 py-2" value="{{ $product->stock }}" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
</x-base-layout>
