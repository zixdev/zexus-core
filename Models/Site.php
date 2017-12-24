<?php

namespace Zix\Core\Models;


/**
 * Class Site
 * @package Zix\Core\Models
 */
class Site extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'url', 'ui', 'status'];
}
