<?php

namespace Zix\Core\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zix\Core\Models\Traits\UuidModelTrait;

/**
 * Class User
 * @package Zix\Core\Models
 */
class BaseUser extends Authenticatable
{
    use UuidModelTrait, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
