<?php

namespace Zix\Core\Http\Resources\Site;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SiteResourceCollection extends ResourceCollection
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
