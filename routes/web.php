<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;




use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/admin/sales', [ProductsController::class, 'salesHistory'])->name('admin.sales')->middleware('auth', 'admin');
Route::get('/', [HomeController::class, 'index']);
Route::get('/seller/{user}', [ProductsController::class, 'showSellerProducts'])->name('seller.products');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/{product}/buy', [ProductController::class, 'buy'])->name('product.buy');
Route::get('/product/{product}/confirmation', [ProductController::class, 'confirmation'])->name('product.confirmation');
Route::get('/admin/sales', [ProductController::class, 'salesHistory'])->middleware('auth', 'admin')->name('admin.sales');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
});


Route::get('/seller/sales', [ProductController::class, 'sellerSalesHistory'])->name('seller.sales');

Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('orders.my_orders');



Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/products', 'products')->name('products');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::resource('products', ProductsController::class)->middleware('auth');


require __DIR__.'/auth.php';
