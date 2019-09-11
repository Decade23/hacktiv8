<?php

namespace App\Services\Mutasi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mutasi;
use App\Models\UserProfile;
use App\Traits\FileUploadTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;
use File;
use Illuminate\Support\Facades\Auth;

class MutasiService implements MutasiServiceContract
{
    use FileUploadTrait;

    public function get($id)
    {
        return Mutasi::where('id',$id)->with('user_profile')->first();
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $folderName = 'mutasi';
    
            $store = new Mutasi();
            $store->user_id                 = $request->userSearch;
            $store->jenis_mutasi            = $request->jenis_mutasi;
            $store->tanggal_mutasi          = $request->tanggal_mutasi;
            $store->sk_mutasi               = $this->saveImage($request->file('sk_mutasi'), $folderName);
            
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
            $folderName = 'mutasi';
            #save To DB...
            $edit = Mutasi::find($request->id);

            $pushArray = array();

            if ($request->hasFile('sk_mutasi')) {
                # code...
                $pushArray = array('sk_mutasi' => $this->saveImage($request->file('sk_mutasi'), $folderName) );

                $this->deleteImage($request->sk_mutasi_hidden);
            }

            $dataUpdate = [
                'jenis_mutasi'      => $request->jenis_mutasi,
                'tanggal_mutasi'    => $request->tanggal_mutasi
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
            'mutasi.id', 'mutasi.user_id', 'jenis_mutasi', 'tanggal_mutasi', 'sk_mutasi', 'mutasi.created_at'
        ];

        $dataDb = Mutasi::select($select)->with('user_profile');

        return DataTables::eloquent($dataDb)
                ->addColumn('action', function($dataDb) {
                    $update = '';
                    $delete = '';
                    $lihat  = '';

                    if (Auth::user()->roles_id == 4) { // bp
                        # code...
                        $delete = '<a href="#" data-href="'.route('mutasi.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                        $update = '<a href="'.route('mutasi.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('mutasi.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 3) { // kt
                        # code...
                        $update = '<a href="'.route('mutasi.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('mutasi.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 2) { // kepsek
                        # code...               
                        $lihat = '<a href="'.route('mutasi.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 1) { // root
                        # code...
                        $delete = '<a href="#" data-href="'.route('mutasi.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                        $update = '<a href="'.route('mutasi.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('mutasi.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
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

            $riwayatPendidikan = Mutasi::select('user_id')->get();

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
        $find = Mutasi::find($id);
        
        #this delete image
        $this->deleteImage($find->sk_mutasi);

        return Mutasi::find($id)->delete();

    }

}