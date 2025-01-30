<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Haal alle producten op
        return view('home', compact('products')); // Stuur de producten naar de 'home' view
    }
}
