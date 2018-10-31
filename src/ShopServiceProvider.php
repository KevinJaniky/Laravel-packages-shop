<?php

namespace Kjaniky\Shop;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ShopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $nb = \Cart::count();
        View::share('panier_count', $nb);
        include __DIR__ . '/routes/routes.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
   

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'shop');
        $this->app->make('Kjaniky\Shop\ShopController');
    }
}
