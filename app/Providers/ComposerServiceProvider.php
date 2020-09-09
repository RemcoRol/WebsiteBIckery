<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers
        view()->composer('layouts.clients', function ($view) {
            $menus = Menu::where('menu_parent_id', '=', 0)->get();
            $allMenus = Menu::pluck('menu_title','id')->all();

            $view->menus = $menus;
            $view->allMenus = $allMenus;
        });
    }
}
