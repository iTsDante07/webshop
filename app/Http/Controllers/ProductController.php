<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    public function sellerSalesHistory()
    {
        $sales = Sale::with(['product', 'buyer', 'seller'])
                    ->where('seller_id', Auth::id())
                    ->get();

        return view('seller.sales', compact('sales'));
    }


    public function buy(Product $product)
    {
        return redirect()->route('cart.add', $product);
    }

    public function confirmation(Product $product)
    {
        return view('products.confirmation', compact('product'));
    }

    public function salesHistory()
    {
        $sales = Sale::with(['product', 'buyer', 'seller'])->get();
        return view('admin.sales', compact('sales'));
    }
}
