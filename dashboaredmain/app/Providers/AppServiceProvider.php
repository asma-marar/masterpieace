<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\ServiceProvider;
use App\Models\Wishlist;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $wishlistCount = 0;
            $cartCount = 0;
    
            if (Auth::guard('customer')->check()) {
                $customerId = Auth::guard('customer')->id();
                
                // Get wishlist count
                $wishlistCount = Wishlist::where('customer_id', $customerId)->count();
                
                // Get cart count
                $cart = Cart::where('customer_id', $customerId)->first();
                if ($cart) {
                    // Use the same counting method as the controller
                    $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');
                }
            }
            
            $view->with([
                'wishlistCount' => $wishlistCount,
                'cartCount' => $cartCount
            ]);
        });
    }
    
}
