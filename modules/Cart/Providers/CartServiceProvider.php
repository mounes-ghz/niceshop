<?php

namespace Modules\Cart\Providers;

use Modules\Cart\Cart;
use Modules\Cart\Storages\Database;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Cart::class, function ($app) {
            return new Cart(
                new Database(),
                $app['events'],
                'cart',
                session()->getId(),
                config('niceshop.modules.cart.config')
            );
        });

        $this->app->alias(Cart::class, 'cart');
    }
}
