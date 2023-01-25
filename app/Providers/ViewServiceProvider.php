<?php

namespace App\Providers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use App\View\Composers\NavigationComposers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Facades\View;

class  ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Vite::macro('image', fn($asset) => $this->asset('resources/images/' . $asset));

        View::composer('*', NavigationComposers::class);
    }
}
