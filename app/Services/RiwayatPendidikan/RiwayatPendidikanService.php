<?php

namespace App\Services\RiwayatPendidikan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RiwayatPendidikan;
use App\Models\UserProfile;
use App\Traits\FileUploadTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;
use File;
use Illuminate\Support\Facades\Auth;

class RiwayatPendidikanService implements RiwayatPendidikanServiceContract
{
    use FileUploadTrait;

    public function get($id)
    {
        return RiwayatPendidikan::where('id',$id)->with('user_profile')->first();
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $folderName = 'riwayat_pendidikan';
    
            $store = new RiwayatPendidikan();
            $store->user_id                 = $request->userSearch;
            $store->tingkat_pendidikan      = $request->tingkatPendidikan;
            $store->nama_sekolah            = $request->namaSekolah;
            $store->alamat_sekolah          = $request->alamatSekolah;
            $store->jurusan                 = $request->jurusan;
            $store->no_ijazah               = $request->noIjazah;
            $store->tanggal_ijazah          = $request->tanggalIjazah;
            $store->file_ijazah             = $this->saveImage($request->file('fileIjazah'), $folderName);
            $store->file_transkip_ijazah    = $this->saveImage($request->file('fileTranskipIjazah'), $folderName);
            $store->file_sertifikat_pendidik= $this->saveImage($request->file('fileSertifikatPendidik'), $folderName);

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
            $folderName = 'riwayat_pendidikan';
            #save To DB...
            $edit = RiwayatPendidikan::find($request->id);

            $pushArray = array();

            if ($request->hasFile('fileIjazah')) {
                # code...
                $pushArray = array('file_ijazah' => $this->saveImage($request->file('fileIjazah'), $folderName) );

                $this->deleteImage($request->fileIjazahHidden);
            }

            if ($request->hasFile('fileTranskipIjazah')) {
                # code...
                $pushArray = array( 'file_transkip_ijazah'    => $this->saveImage($request->file('fileTranskipIjazah'), $folderName) );

                $this->deleteImage($request->fileTranskipIjazahHidden);
            }

            if ($request->hasFile('fileSertifikatPendidik')) {
                # code...
                $pushArray = array( 'file_sertifikat_pendidik'    => $this->saveImage($request->file('fileSertifikatPendidik'), $folderName) );

                $this->deleteImage($request->fileSertifikatPendidikHidden);
            }

            $dataUpdate = [
                'tingkat_pendidikan'      => $request->tingkatPendidikan,
                'nama_sekolah'            => $request->namaSekolah,
                'alamat_sekolah'          => $request->alamatSekolah,
                'jurusan'                 => $request->jurusan,
                'no_ijazah'               => $request->noIjazah,
                'tanggal_ijazah'          => $request->tanggalIjazah
            ];

            // dd(array_merge($dataUpdate, $pushArray));
            $edit->update(array_merge($dataUpdate, $pushArray));
            
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
            'riwayat_pendidikan.id', 'user_id', 'tingkat_pendidikan', 'nama_sekolah', 'alamat_sekolah', 'jurusan', 'no_ijazah', 'tanggal_ijazah', 'file_ijazah', 'file_transkip_ijazah','file_sertifikat_pendidik', 'riwayat_pendidikan.created_at'
        ];

        $dataDb = RiwayatPendidikan::select($select)->with('user_profile');

        return DataTables::eloquent($dataDb)
                ->addColumn('action', function($dataDb) {
                    $update = '';
                    $delete = '';
                    $lihat  = '';

                    if (Auth::user()->roles_id == 4) { // bp
                        # code...
                        $delete = '<a href="#" data-href="'.route('riwayat_pendidikan.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                        $update = '<a href="'.route('riwayat_pendidikan.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('riwayat_pendidikan.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 3) { // kt
                        # code...
                        $update = '<a href="'.route('riwayat_pendidikan.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('riwayat_pendidikan.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 2) { // kepsek
                        # code...               
                        $lihat = '<a href="'.route('riwayat_pendidikan.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 1) { // root
                        # code...
                        $delete = '<a href="#" data-href="'.route('riwayat_pendidikan.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                        $update = '<a href="'.route('riwayat_pendidikan.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('riwayat_pendidikan.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 



                    
                    return $update.$lihat.$delete;
                })
                ->rawColumns(['action'])
                ->make(true);
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

            $riwayatPendidikan = RiwayatPendidikan::select('user_id')->get();

            $dataDb = UserProfile::select('id', DB::raw("concat( nama, ' (', nip, ') ') as text"))
                // ->where('email', 'LIKE', '%'.$request->term.'%')
                ->where('nama', 'LIKE', '%'.$request->term.'%')
                ->whereNotIn('id', $riwayatPendidikan)
                ->orderBy('id')->paginate($perPage);

            return $dataDb;

        } catch (\Exception $exception) {

            // dd($exception->getMessage());
            return $exception->getCode();
        }
    }

    public function delete($id)
    {
        $find = RiwayatPendidikan::find($id);
        
        #this delete image
        $this->deleteImage($find->file_ijazah);
        $this->deleteImage($find->file_transkip_ijazah);
        $this->deleteImage($find->file_sertifikat_pendidik);

        return RiwayatPendidikan::find($id)->delete();

    }

}