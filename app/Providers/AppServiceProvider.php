<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cartCount = 0;
            if (Auth::check()) {
                $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
            }
            $view->with('cartCount', $cartCount);
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
