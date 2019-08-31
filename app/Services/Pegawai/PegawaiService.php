<?php

namespace App\Services\Pegawai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserProfile;
use App\Traits\UserTrait;
use Yajra\DataTables\Facades\DataTables;

class PegawaiService implements PegawaiServiceContract
{
    use UserTrait;

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $store = new UserProfile();
            $store->nip                 = $request->nip;
            $store->nama                = $request->nama;
            $store->no_ktp              = $request->noKtp;
            $store->email               = $request->email;
            $store->no_telepon          = $request->phone;
            $store->tempat_lahir        = $request->tempat_lahir;
            $store->tanggal_lahir       = $request->tanggal_lahir;
            $store->jenis_kelamin       = $request->jenis_kelamin;
            $store->jabatan_id          = $request->jabatan;
            $store->status_kawin_id     = $request->statusKawin;
            $store->alamat              = $request->alamat;
            $store->status_kepegawaian  = $request->statusKepegawaian;

            $store->save();

            // dd($store);
            
            #create User Login
            $this->storeUserCredentials($request);
            
            DB::commit();
            return $store;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            dd($e->getMessage().' '.$e->getLine());
            return $e->getCode();
        }
    }

    public function datatables($request)
    {
        $select = [
            'user_profile.id', 'nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'jabatan_id', 'no_ktp', 'alamat', 'status_kawin_id','status_kepegawaian','email', 'no_telepon','user_profile.created_at'
            
        ];

        $dataDb = UserProfile::select($select);

        return DataTables::eloquent($dataDb)->make(true);
    }

}