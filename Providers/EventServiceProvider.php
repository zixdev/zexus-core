<?php

namespace Zix\Core\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Zix\Core\Events\Seeder\GetAppPermissions;
use Zix\Core\Listeners\Seeder\AppPermissionsCreateListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        GetAppPermissions::class => [
            AppPermissionsCreateListener::class,
        ]
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }


}
