<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        return view('checkout.index', compact('cartItems'));
    }

    public function processCheckout(Request $request)
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();

        foreach ($cartItems as $item) {
            $product = $item->product;

            if ($product->stock < $item->quantity) {
                return redirect()->route('checkout')->with('error', 'Not enough stock for ' . $product->name);
            }

            // Reduce stock
            $product->stock -= $item->quantity;
            $product->save();

            // Register the sale
            Sale::create([
                'product_id' => $product->id,
                'buyer_id' => Auth::id(),
                'seller_id' => $product->user_id,
                'quantity' => $item->quantity,
            ]);
        }

        // Clear the cart after successful checkout
        Auth::user()->cartItems()->delete();

        return redirect()->route('products.index')->with('success', 'Checkout completed successfully!');
    }
}
