<?php

namespace Zix\Core\Http\Resources\Config;

use Illuminate\Http\Resources\Json\Resource;

class ConfigResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
