<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Board;
use App\Models\Thread;

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
        // Wildcard for any admin pages
        View::composer(['admin.mastermind'], function ($view) {
            $view->with([
                'boardcount' => Board::count(),
                'allboards' => Board::orderBy('uri', 'asc')->get(),
                'postcount' => Thread::count(),
            ]);
        });

        // Main public views
        View::composer(['main.*'], function ($view) {
            $view->with('boards', Board::where('is_indexed', true)->orderBy('uri', 'asc')->get());
        });

        // Board pages
        View::composer(['board.view'], function ($view) {
            $view->with([
                'threads' => Thread::where('board', request()->route()->parameter('uri'))->orderBy('created_at', 'desc')->get(),
                'board' => Board::where('uri', request()->route()->parameter('uri'))->first(),
                'boards' => Board::where('is_indexed', true)->orderBy('uri', 'asc')->get(),
            ]);
        });

        // Thread pages
        View::composer(['thread.view'], function ($view) {
            $view->with([
                'boards' => Board::where('is_indexed', true)->orderBy('uri', 'asc')->get(),
            ]);
        });
    }
}