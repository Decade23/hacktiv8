<?php

namespace App\Traits;

use App\Models\Auth\User;

trait UserTrait
{
    public function storeUserCredentials($request)
    {
        $username = date('md'). substr($request->phone, 0, 5); // bulan, tanggal dan 5 angka depan no hp

        $storeDb = new User();
        $storeDb->username = $username;
        $storeDb->password = bcrypt($username);
        $storeDb->roles_id = 3;

        $storeDb->save();

        return $storeDb;
        
        
    }
}