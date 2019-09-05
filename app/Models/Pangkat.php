<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    protected $table = 'pangkat';
    
    protected $fillable = [
        'user_id', 'pangkat', 'golongan', 'nomor_sk', 'tanggal_sk', 'sk_file_pangkat'
    ];

    public function user_profile()
    {
    	return $this->belongsTo(UserProfile::class, 'user_id','id');
    }
}
