<?php

namespace App\Providers;

use App\Models\Meta;
use App\Models\SelectTheme;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer(['layouts.app'], function ($view) {
            $view->with([
                'select_themes' => SelectTheme::All(),
                'users' => User::All(),
                'meta' => Meta::first(),
                'url' => url('/')
            ]);
        });
        // View::composer(['layouts.app'], function ($view) {
        //     $view->with(['users' => User::All()]);
        // });
    }
}
