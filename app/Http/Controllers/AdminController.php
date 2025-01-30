<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'stock' => 'required|integer',
        ]);

        $product->update($data);
        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
    public function salesHistory(Request $request)
    {
        // Get all users who have sales
        $sellers = User::has('sales')->get();

        // Initialize the query for sales
        $query = Sale::with(['product', 'buyer', 'seller']);

        // Filter by selected seller if provided
        if ($request->has('seller_id') && $request->seller_id != 'all') {
            $query->where('seller_id', $request->seller_id);
        }

        // Execute the query to get sales
        $sales = $query->get();

        // Pass both $sales and $sellers to the view
        return view('admin.sales', compact('sales', 'sellers'));
    }

}

