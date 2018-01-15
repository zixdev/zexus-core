<?php

namespace Zix\Core\Listeners\Seeder;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Zix\Core\Events\Seeder\GetAppPermissions;

class AppPermissionsCreateListener
{


    /**
     * Handle the event.
     *
     * @param GetAppPermissions $event
     * @return void
     */
    public function handle(GetAppPermissions $event)
    {
        $event->collection
            ->push('sites')
            ->push('configs')
            ->push('users')
            ->push('roles')
            ->push('pages')
            ->push('menus')
            ->push('seo')
            ->push('tags');
    }
}
