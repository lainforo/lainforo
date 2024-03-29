<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Models\Board;
use App\Models\Thread;
use App\Models\Reply;
use App\Models\Ban;

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
        View::composer(['admin.*'], function ($view) {
            $view->with([
                'boardcount' => Board::count(),
                'allboards' => Board::orderBy('uri', 'asc')->get(),
                'postcount' => Thread::count(),
                'activebans' => Ban::orderBy('created_at', 'asc')->get()
            ]);
        });

        View::composer(['admin.editboard'], function ($view) {
            $view->with([
                'board' => Board::where('uri', request()->route()->parameter('uri'))->first(),
            ]);
        });

        // Main public views
        View::composer(['main.*', 'admin.login'], function ($view) {
            $view->with('boards', Board::where('is_indexed', true)->orderBy('uri', 'asc')->get());
        });

        // Board pages
        View::composer(['board.view'], function ($view) {
            $uri = request()->route()->parameter('uri');
            $request = app(Request::class);

            if ($request->hasCookie('adminlogin')) {
                $boards = Board::orderBy('uri', 'asc')->get();
            } else {
                $boards = Board::where('is_indexed', true)->orderBy('uri', 'asc')->get();
            }
            
            $view->with([
                'boards' => $boards,
                'threads' => Thread::where('board', $uri)->orderBy('created_at', 'desc')->get(),
                'board' => Board::where('uri', $uri)->first(),
            ]);
        });

        // Thread pages
        View::composer(['thread.view'], function ($view) {
            $view->with([
                'boards' => Board::where('is_indexed', true)->orderBy('uri', 'asc')->get(),
                'board' => Board::where('uri', request()->route()->parameter('uri'))->first(),
            ]);
        });
    }
}