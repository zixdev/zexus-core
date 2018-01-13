<?php

namespace Zix\Core\Models;

use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 * @package Zix\Core\Models
 */
class Role extends SpatieRole
{
    protected $fillable = ['name', 'guard_name'];
}
