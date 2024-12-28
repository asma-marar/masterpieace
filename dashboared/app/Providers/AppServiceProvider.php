<?php

namespace App\Providers;

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
            if (Auth::guard('customer')->check()) {
                $wishlistCount = Wishlist::where('customer_id', Auth::guard('customer')->user()->id)->count();
            }
            $view->with('wishlistCount', $wishlistCount);
        });
    }
}
