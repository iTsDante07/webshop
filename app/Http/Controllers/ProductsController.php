<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Auth::user()->isAdmin()
            ? Product::with('user')->get()
            : Auth::user()->products;

        $sellers = Auth::user()->isAdmin() ? User::has('products')->get() : collect();

        $sales = (Auth::user()->isAdmin() || Auth::user()->isSeller())
            ? Sale::with(['product', 'buyer', 'seller'])
                  ->where('seller_id', Auth::id())
                  ->get()
            : collect();

        return view('products.index', compact('products', 'sellers', 'sales'));
    }

    public function showSellerProducts(User $user)
    {
        $products = $user->products;
        $sellers = User::has('products')->get();
        $sales = collect();

        return view('products.index', compact('products', 'sellers', 'sales'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $productData = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        Auth::user()->products()->create($productData);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }



    public function show(Product $product)
    {
        $this->authorize('view', $product);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
