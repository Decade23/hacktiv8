<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
    
    protected $fillable = [
        'user_id', 'jenis_mutasi', 'tanggal_mutasi', 'sk_mutasi'
    ];

    public function user_profile()
    {
    	return $this->belongsTo(UserProfile::class, 'user_id','id');
    }
}
