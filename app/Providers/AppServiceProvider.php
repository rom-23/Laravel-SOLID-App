<?php

namespace App\Providers;


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
//        Article::observe(ArticleObserver::class);

    }
}
