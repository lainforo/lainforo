<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Board;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['main.index'], function ($view) {
            $view->with('boards', Board::where('is_indexed', true)->orderBy('uri', 'asc')->get());
        });

        View::composer(['admin.*'], function ($view) {
            $view->with('boards', Board::orderBy('uri', 'asc')->get());
        });
    }
}