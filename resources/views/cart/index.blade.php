<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">Product</th>
                        <th class="px-4 py-2 border">Quantity</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Total</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="px-4 py-2 border">{{ $item->product->name }}</td>
                            <td class="px-4 py-2 border">
                                <form action="{{ route('cart.update', $item) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 border rounded">
                                    <button type="submit" class="ml-2 bg-blue-500 text-white rounded px-2 py-1">Update</button>
                                </form>
                            </td>
                            <td class="px-4 py-2 border">€{{ number_format($item->product->price, 2) }}</td>
                            <td class="px-4 py-2 border">€{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            <td class="px-4 py-2 border">
                                <form action="{{ route('cart.remove', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white rounded px-2 py-1">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right mt-4">
                <a href="{{ route('checkout') }}" class="bg-green-500 text-white rounded-lg py-2 px-4 hover:bg-green-600">Proceed to Checkout</a>
            </div>
        @endif
    </div>
</x-base-layout>
