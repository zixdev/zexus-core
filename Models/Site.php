<?php

namespace Zix\Core\Models;
use Zix\Core\Models\Traits\ConfigableTrait;


/**
 * Class Site
 * @package Zix\Core\Models
 */
class Site extends BaseModel
{
    use ConfigableTrait;
    /**
     * @var array
     */
    protected $fillable = ['name', 'url', 'ui', 'status'];
}
