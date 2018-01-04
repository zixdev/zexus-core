<?php

namespace Zix\Core\Http\Resources\LanguageLine;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LanguageLineResourceCollection extends ResourceCollection
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
