<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionHouse extends Model
{
    protected $table = 'ProductionHouse';

    public $timestamps = false;

    protected $fillable = [
        'id', 'name'
    ];

    public function movies()
    {
    	return $this->belongsTo(Movie::class, 'id','productionHouseId');
    }
}
