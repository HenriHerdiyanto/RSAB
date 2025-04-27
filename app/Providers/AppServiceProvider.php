<?php

namespace App\Providers;

use App\Models\UserMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $userMenus = UserMenu::where('user_id', Auth::id())->pluck('menu_id')->toArray();
                $view->with('userMenus', $userMenus);
            }
        });
    }
}
