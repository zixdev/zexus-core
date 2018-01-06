<?php

namespace Zix\Core\Http\Resources\Translation;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TranslationResourceCollection extends ResourceCollection
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
