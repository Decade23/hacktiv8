<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class UserProfile extends Model
{
    protected $table = 'user_profile';
    
    protected $fillable = [
        'id', 'nip', 'ktp', 'photo', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_telepon', 'alamat', 'status_kawin', 'status_kepegawaian'
    ];

    public function jabatans()
    {
    	return $this->belongsTo(Jabatan::class, 'jabatan_id','id');
    }

    public function user_login()
    {
    	return $this->belongsTo(User::class, 'user_profile_id','id');
    }

    
}
