<?php

namespace Zix\Core\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AssetsServiceProvider
 * @package Zix\Core\Providers
 */
class AssetsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();
    }


    /**
     * Register Core Views
     */
    public function registerViews()
    {
        // @TODO:: check if this are correct path
        $viewPath = base_path('views/modules/core');

        $sourcePath = __DIR__ . '/../Assets';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom([$viewPath, $sourcePath], 'core');
    }

}
