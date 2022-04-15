<?php

namespace App\Providers;


use App\Models\Menu;
use App\Observers\MenuObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * @return void
     */
    public function boot(): void
    {
//        Menu::observe(MenuObserver::class);

    }
}
