<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class UserProfile extends Model
{
    protected $table = 'user_profile';
    
    protected $fillable = [
        'nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'jabatan_id', 'no_ktp', 'alamat', 'status_kawin_id', 'status_kepegawaian', 'email', 'no_telepon'
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
