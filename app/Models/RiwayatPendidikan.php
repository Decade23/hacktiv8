<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class RiwayatPendidikan extends Model
{
    protected $table = 'riwayat_pendidikan';
    
    protected $fillable = [
        'user_id', 'tingkat_pendidikan', 'nama_sekolah', 'alamat_sekolah', 'jurusan', 'tanggal_ijazah', 'file_ijazah', 'file_transkip_ijazah', 'file_sertifikat_pendidik', 'no_ijazah'
    ];

    public function user_profile()
    {
    	return $this->belongsTo(UserProfile::class, 'user_id','id');
    }

    
}
