<?php

namespace Api\Users\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'mysql_ext';
	const TABLE_NAME   = 'users';
	const STATE_ACTIVE = true;
	const STATE_INACTIVE = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'role_id', 'name', 'lastname', 'email', 'password',
        //AUDITORY
        'flag_active', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $cast = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'updated_at', 'deleted_at'
    ];
}