<x-base-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Mijn Verkoopgeschiedenis</h1>
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Product ID</th>
                    <th class="px-4 py-2 border">Product</th>
                    <th class="px-4 py-2 border">Aantal</th>
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
                        <td class="px-4 py-2 border">{{ $sale->buyer->name }}</td>
                        <td class="px-4 py-2 border">{{ $sale->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-base-layout>
