<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'user_id';
    protected $table = 'users';
    protected $fillable = [
        'name', 'address','occupation','mobile','telephone_no', 'email','date_of_formation','password', 'role', 'items','organization_type'
    ];
}
