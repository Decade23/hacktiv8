<?php

namespace App\Services\Pegawai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserProfile;
use App\Traits\UserTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;

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
            $store->no_telepon          = $request->noTelepon;
            $store->tempat_lahir        = $request->tempat_lahir;
            $store->tanggal_lahir       = $request->tanggal_lahir;
            $store->jenis_kelamin       = $request->jenis_kelamin;
            $store->status_kawin        = $request->statusKawin;
            $store->alamat              = $request->alamat;
            $store->status_kepegawaian  = $request->statusKepegawaian;

            $store->save();

            // dd($store);
            
            #create User Login
            // $this->storeUserCredentials($request);
            
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
            'user_profile.id', 'nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'status_kawin','status_kepegawaian', 'no_telepon', 'user_profile.created_at'
        ];

        $dataDb = UserProfile::select($select);

        return DataTables::eloquent($dataDb)->make(true);
    }

    public function select2($request)
    {
        try {
            $perPage = 10;
            $page    = $request->page ?? 1;

            Paginator::currentPageResolver(
                function () use ($page) {
                    return $page;
                }
            );

            $dataDb = UserProfile::select('id', DB::raw("concat( nama, ' (', nip, ') ') as text"))
                // ->where('email', 'LIKE', '%'.$request->term.'%')
                ->where('nama', 'LIKE', '%'.$request->term.'%')
                ->orderBy('id')->paginate($perPage);

            return $dataDb;

        } catch (\Exception $exception) {

            // dd($exception->getMessage());
            return $exception->getCode();
        }
    }

}