<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_ADMIN = 'admin';
    const ROLE_LEADER = 'leader';
    const ROLE_EMPLOYEES = 'employees';

    const ROOM_SEO = 'SEO';
    const ROOM_MO = 'MO';
    const ROOM_CONTENT = 'Content';

    use Notifiable;

    const GROUP_LEVEL = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_LEADER => 'Leader',
        self::ROLE_EMPLOYEES => 'Employees',
    ];

    const GROUP_ROOM = [
        self::ROOM_SEO => 'SEO',
        self::ROOM_MO => 'MO Care',
        self::ROOM_CONTENT => 'Content',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','branchid','roomid','levelid'
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
