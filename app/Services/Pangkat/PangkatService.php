<?php

namespace App\Services\Pangkat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pangkat;
use App\Models\UserProfile;
use App\Traits\FileUploadTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;
use File;
use Illuminate\Support\Facades\Auth;


class PangkatService implements PangkatServiceContract
{
    use FileUploadTrait;

    public function get($id)
    {
        return Pangkat::where('id',$id)->with('user_profile')->first();
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $folderName = 'pangkat';
    
            $store = new Pangkat();
            $store->user_id            = $request->userSearch;
            $store->pangkat            = $request->pangkat;
            $store->golongan           = $request->golongan;
            $store->nomor_sk           = $request->nomor_sk;
            $store->tanggal_sk         = $request->tanggal_sk;
            $store->sk_file_pangkat    = $this->saveImage($request->file('sk_file_pangkat'), $folderName);
            
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
            $folderName = 'pangkat';
            #save To DB...
            $edit = Pangkat::find($request->id);

            $pushArray = array();

            if ($request->hasFile('sk_file_pangkat')) {
                # code...
                $pushArray = array('sk_file_pangkat' => $this->saveImage($request->file('sk_file_pangkat'), $folderName) );

                $this->deleteImage($request->sk_file_pangkat_hidden);
            }

            $dataUpdate = [
                'pangkat'     => $request->pangkat,
                'golongan'    => $request->golongan,
                'nomor_sk'    => $request->nomor_sk,
                'tanggal_sk'  => $request->tanggal_sk,
                
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
            'pangkat.id', 'pangkat.user_id', 'pangkat', 'golongan', 'nomor_sk', 'tanggal_sk', 'sk_file_pangkat', 'pangkat.created_at'
        ];

        $dataDb = Pangkat::select($select)->with('user_profile');

        return DataTables::eloquent($dataDb)
                ->editColumn('sk_file_pangkat', function($dataDb) {
                    return '<img src="'.url($dataDb->sk_file_pangkat).'" alt="sk file jabatan" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; height:100px; cursor:pointer;" onClick=viewImage(\''.url(str_replace('\\', '/',$dataDb->sk_file_pangkat)).'\')>';
                })
                ->addColumn('action', function($dataDb) {
                    $update = '';
                    $delete = '';
                    $lihat  = '';

                    if (Auth::user()->roles_id == 4) { // bp
                        # code...
                        $delete = '<a href="#" data-href="'.route('kepegawaian.pangkat.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                        $update = '<a href="'.route('kepegawaian.pangkat.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('kepegawaian.pangkat.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 3) { // kt
                        # code...
                        $update = '<a href="'.route('kepegawaian.pangkat.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('kepegawaian.pangkat.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 2) { // kepsek
                        # code...               
                        $lihat = '<a href="'.route('kepegawaian.pangkat.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 

                    if (Auth::user()->roles_id == 1) { // root
                        # code...
                        $delete = '<a href="#" data-href="'.route('kepegawaian.pangkat.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                        $update = '<a href="'.route('kepegawaian.pangkat.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';                
                        $lihat = '<a href="'.route('kepegawaian.pangkat.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>'; 
                    } 



                    
                    return $update.$lihat.$delete;
                })
                ->rawColumns(['action','sk_file_pangkat'])
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

            $pangkat = Pangkat::select('user_id')->get();

            $dataDb = UserProfile::select('id', DB::raw("concat( nama, ' (', nip, ') ') as text"))
                // ->where('email', 'LIKE', '%'.$request->term.'%')
                ->where('nama', 'LIKE', '%'.$request->term.'%')
                ->whereNotIn('id', $pangkat)
                ->orderBy('id')->paginate($perPage);

            return $dataDb;

        } catch (\Exception $exception) {

            // dd($exception->getMessage());
            return $exception->getCode();
        }
    }

    public function delete($id)
    {
        $find = Pangkat::find($id);
        
        #this delete image
        $this->deleteImage($find->sk_mutasi);

        return Pangkat::find($id)->delete();

    }

}