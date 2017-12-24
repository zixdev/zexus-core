<?php

namespace Zix\Core\Http\Resources\Site;

use Illuminate\Http\Resources\Json\Resource;

class SiteResource extends Resource
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
