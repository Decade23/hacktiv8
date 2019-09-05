<?php

namespace App\Services\Mutasi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mutasi;
use App\Traits\UserTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;

class MutasiService implements MutasiServiceContract
{
    use UserTrait;

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $store = new Mutasi();
            $store->user_id                 = $request->userSearch;
            $store->jenis_mutasi            = $request->jenisMutasi;
            $store->nama_sekolah            = $request->namaSekolah;
            $store->alamat_sekolah          = $request->alamatSekolah;
            $store->jurusan                 = $request->jurusan;
            $store->no_ijazah               = $request->noIjazah;
            $store->tanggal_ijazah          = $request->jenis_kelamin;
            $store->file_ijazah             = $request->fileIjazah;
            $store->file_transkip_ijazah    = $request->fileTranskipIjazah;
            $store->file_sertifikat_pendidik= $request->fileSertifikatPendidik;

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
            'user_id', 'jenis_mutasi', 'tanggal_mutasi', 'sk_mutasi', 'mutasi.created_at'
        ];

        $dataDb = Mutasi::select($select)->with('user_profile');

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