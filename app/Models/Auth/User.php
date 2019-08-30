<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'username', 'password', 'roles_id', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
