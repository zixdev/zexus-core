<?php

namespace Zix\Core\Listeners\Seeder;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Zix\Core\Events\Seeder\AppPermissionsCreate;

class AppPermissionsCreateListener
{


    /**
     * Handle the event.
     *
     * @param AppPermissionsCreate $event
     * @return void
     */
    public function handle(AppPermissionsCreate $event)
    {
        $event->collection
            ->push('sites')
            ->push('configs')
            ->push('users')
            ->push('roles');
    }
}
