<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    
    protected $fillable = [
        'user_id', 'jabatan', 'golongan', 'tmt_jabatan', 'sk_file_jabatan'
    ];

    public function user_profile()
    {
    	return $this->belongsTo(UserProfile::class, 'user_id','id');
    }

    public function mutasi_user()
    {
    	return $this->belongsTo(Mutasi::class, 'user_id','user_id');
    }
}
