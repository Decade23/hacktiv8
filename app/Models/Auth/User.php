<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;;

class User extends Model
{
	protected $table = 'users';
	
    protected $fillable = [
        'username', 'password', 'roles_id', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function roles()
    {
    	return $this->belongsTo(Roles::class, 'roles_id','id');
    }
}
}
