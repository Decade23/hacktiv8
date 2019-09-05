<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
	protected $table = 'roles';
	
    protected $fillable = [
        'nama', 'slug'
    ];

    public function users()
    {
    	return $this->belongsTo(User::class, 'roles_id','id');
    }
}
