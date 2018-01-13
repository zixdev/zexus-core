<?php

namespace Zix\Core\Events\Seeder;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Collection;

class AppPermissionsCreate
{
//    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Collection
     */
    public $collection;


    /**
     * AppPermissionsCreate constructor.
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {

        $this->collection = $collection;
    }

//    /**
//     * Get the channels the event should broadcast on.
//     *
//     * @return \Illuminate\Broadcasting\Channel|array
//     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}
