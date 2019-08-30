<?php

namespace App\Services\Pegawai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Auth\User;
use App\Models\UserProfile;
use App\Traits\UserTrait;

class PegawaiService implements PegawaiServiceContract
{
    use UserTrait;

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $store = new User();
            $store->nip                 = $request->nip;
            $store->nama                = $request->nama;
            $store->no_ktp              = $request->noKtp;
            $store->email               = $request->email;
            $store->no_telepon          = $request->phone;
            $store->tempat_lahir        = $request->tempat_lahir;
            $store->tanggal_lahir       = $request->dob;
            $store->jenis_kelamin       = $request->gender;
            $store->jabatan_id          = $request->jabatan;
            $store->status_kawin_id     = $request->statusKawin;
            $store->alamat              = $request->alamat;

            $store->save();
            
            #create User Login
            $this->storeUserCredentials($request);
            
            DB::commit();
            return $store;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            // dd($e->getMessage().' '.$e->getLine());
            return $e->getCode();
        }
    }

}