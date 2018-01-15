<?php

namespace Zix\Core\Models;

use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 * @package Zix\Core\Models
 */
class Role extends SpatieRole implements \Spatie\Permission\Contracts\Role
{
    protected $fillable = ['name', 'guard_name'];
    protected $guard_name = 'api';
}
