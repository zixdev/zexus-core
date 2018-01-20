<?php

namespace Zix\Core\Http\Resources\SiteConfig;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SiteConfigResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
