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

    public function get($id)
    {
        return UserProfile::find($id)->with('user_login')->first();
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $store = new UserProfile();
            $store->nip                 = $request->nip;
            $store->ktp                 = $request->ktp;
            $store->nama                = $request->nama;
            $store->tempat_lahir        = $request->tempat_lahir;
            $store->tanggal_lahir       = $request->tanggal_lahir;
            $store->jenis_kelamin       = $request->jenis_kelamin;
            $store->status_kawin        = $request->statusKawin;
            $store->status_kepegawaian  = $request->statusKepegawaian;
            $store->alamat              = $request->alamat;
            $store->no_telepon          = $request->noTelepon;

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

    public function edit($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $edit = UserProfile::find($request->id);
            $dataUpdate = [
                'nip'                 => $request->nip,
                'ktp'                 => $request->ktp,
                'nama'                => $request->nama,
                'tempat_lahir'        => $request->tempat_lahir,
                'tanggal_lahir'       => $request->tanggal_lahir,
                'jenis_kelamin'       => $request->jenis_kelamin,
                'status_kawin'        => $request->status_kawin,
                'status_kepegawaian'  => $request->statusKepegawaian,
                'alamat'              => $request->alamat,
                'no_telepon'          => $request->noTelepon
            ];

            $edit->update($dataUpdate);
            
            DB::commit();
            return $edit;
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
            'user_profile.id', 'nip', 'ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'status_kawin','status_kepegawaian', 'no_telepon', 'user_profile.created_at'
        ];

        $dataDb = UserProfile::select($select);

        return DataTables::eloquent($dataDb)
                ->addColumn('action', function($dataDb) {
                    return '<a href="'.route('pegawai.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>
                            <a href="#" data-href="'.route('pegawai.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>
                            <a href="'.route('pegawai.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function delete($id)
    {
        return UserProfile::find($id)->delete();

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