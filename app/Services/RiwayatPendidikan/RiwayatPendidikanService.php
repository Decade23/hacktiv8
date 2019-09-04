<?php

namespace App\Services\RiwayatPendidikan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RiwayatPendidikan;
use App\Traits\UserTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;

class RiwayatPendidikanService implements RiwayatPendidikanServiceContract
{
    use UserTrait;

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $store = new RiwayatPendidikan();
            $store->user_id                 = $request->userSearch;
            $store->tingkat_pendidikan      = $request->tingkatPendidikan;
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
            'user_id', 'tingkat_pendidikan', 'nama_sekolah', 'alamat_sekolah', 'jurusan', 'no_ijazah', 'tanggal_ijazah', 'file_ijazah', 'file_transkip_ijazah','file_sertifikat_pendidik', 'riwayat_pendidikan.created_at'
        ];

        $dataDb = RiwayatPendidikan::select($select)->with('user_profile');

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