<?php

namespace Zix\Core\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 * @package Zix\Core\Models
 */
class Permission extends SpatiePermission
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'guard_name'];
}
