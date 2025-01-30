<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">All Products</h1>

        <!-- Verkoper lijst, alleen zichtbaar voor admins -->
        @if(auth()->user()->isAdmin())
            <div class="mb-6">
                <h2 class="text-2xl font-semibold mb-4">Sellers</h2>
                <ul class="bg-gray-100 p-4 rounded-lg shadow-md">
                    <li class="mb-2">
                        <a href="{{ route('products.index') }}" class="text-blue-600 font-bold hover:text-blue-800 hover:underline">
                            Alles Zien
                        </a>
                    </li>
                    @foreach($sellers as $seller)
                        <li class="mb-2">
                            <a href="{{ route('seller.products', $seller) }}" class="text-gray-700 font-medium hover:text-blue-500 hover:underline">
                                {{ $seller->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add New Product</a>

        <div class="mt-4">
            @if($products->count())
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Price</th>
                            <th class="px-4 py-2 border">Stock</th>
                            @if(auth()->user()->isAdmin())
                                <th class="px-4 py-2 border">Seller</th>
                            @endif
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="px-4 py-2 border">{{ $product->name }}</td>
                                <td class="px-4 py-2 border">€{{ $product->price }}</td>
                                <td class="px-4 py-2 border">{{ $product->stock }}</td>
                                @if(auth()->user()->isAdmin())
                                    <td class="px-4 py-2 border">{{ $product->user->name }}</td>
                                @endif
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('products.show', $product) }}" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">View</a>
                                    <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No products available.</p>
            @endif
        </div>
        @if($sales->isNotEmpty())
        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-6">Mijn Verkoopgeschiedenis</h1>
            <table class="min-w-full bg-white border">
                <!-- Table headers and rows -->
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Product ID</th>
                        <th class="px-4 py-2 border">Product</th>
                        <th class="px-4 py-2 border">Aantal</th>
                        <th class="px-4 py-2 border">Totale Prijs</th>
                        <th class="px-4 py-2 border">Koper</th>
                        <th class="px-4 py-2 border">Datum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td class="px-4 py-2 border">{{ $sale->product->id }}</td>
                            <td class="px-4 py-2 border">{{ $sale->product->name }}</td>
                            <td class="px-4 py-2 border">{{ $sale->quantity }}</td>
                            <td class="px-4 py-2 border">€{{ number_format($sale->product->price * $sale->quantity, 2) }}</td>
                            <td class="px-4 py-2 border">{{ $sale->buyer->name }}</td>
                            <td class="px-4 py-2 border">{{ $sale->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
    @endif


    </div>
</x-base-layout>
