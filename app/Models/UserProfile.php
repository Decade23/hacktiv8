<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    // protected $table = '';
    protected $fillable = [
        'nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'jabatan_id', 'no_ktp', 'alamat', 'status_kawin_id', 'status_kepegawaian', 'email', 'no_telepon'
    ];
}
