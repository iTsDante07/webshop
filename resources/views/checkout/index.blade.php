<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Checkout</h1>

        @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif

        <table class="min-w-full bg-white border mb-6">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Product</th>
                    <th class="px-4 py-2 border">Quantity</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td class="px-4 py-2 border">{{ $item->product->name }}</td>
                        <td class="px-4 py-2 border">{{ $item->quantity }}</td>
                        <td class="px-4 py-2 border">€{{ number_format($item->product->price, 2) }}</td>
                        <td class="px-4 py-2 border">€{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-green-500 text-white rounded-lg py-2 hover:bg-green-600">Confirm Purchase</button>
        </form>
    </div>
</x-base-layout>
