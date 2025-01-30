<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Mijn Bestellingen</h1>
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Product ID</th>
                    <th class="px-4 py-2 border">Product</th>
                    <th class="px-4 py-2 border">Aantal</th>
                    <th class="px-4 py-2 border">Totale Prijs</th>
                    <th class="px-4 py-2 border">Verkoper</th>
                    <th class="px-4 py-2 border">Datum</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="px-4 py-2 border">{{ $order->product->id }}</td>
                        <td class="px-4 py-2 border">{{ $order->product->name }}</td>
                        <td class="px-4 py-2 border">{{ $order->quantity }}</td>
                        <td class="px-4 py-2 border">
                            €{{ number_format($order->product->price * $order->quantity, 2) }}
                        </td>
                        <td class="px-4 py-2 border">{{ $order->seller->name }}</td>
                        <td class="px-4 py-2 border">{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-base-layout>
