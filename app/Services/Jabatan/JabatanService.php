<?php

namespace App\Services\Jabatan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jabatan;
use App\Models\UserProfile;
use App\Traits\FileUploadTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;
use File;

class JabatanService implements JabatanServiceContract
{
    use FileUploadTrait;

    public function get($id)
    {
        return Jabatan::find($id)->with('user_profile')->first();
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $folderName = 'jabatan';
    
            $store = new Jabatan();
            $store->user_id                 = $request->userSearch;
            $store->jabatan           		= $request->jabatan;
            $store->golongan    	    	= $request->golongan;
            $store->tmt_jabatan     	    = $request->tmt_jabatan;
            $store->sk_file_jabatan         = $this->saveImage($request->file('sk_file_jabatan'), $folderName);
            
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
            $folderName = 'jabatan';
            #save To DB...
            $edit = Jabatan::find($request->id);

            $pushArray = array();

            if ($request->hasFile('sk_file_jabatan')) {
                # code...
                $pushArray = array('sk_file_jabatan' => $this->saveImage($request->file('sk_file_jabatan'), $folderName) );

                $this->deleteImage($request->sk_file_jabatan_hidden);
            }

            $dataUpdate = [
                'jabatan'      => $request->jabatan,
                'golongan'     => $request->golongan,
                'tmt_jabatan'  => $request->tmt_jabatan,
                
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
            'jabatan.id', 'jabatan.user_id', 'jabatan.jabatan', 'golongan', 'tmt_jabatan', 'jabatan.sk_file_jabatan','jabatan.created_at'
        ];

        $dataDb = Jabatan::select($select)->with('user_profile');

        return DataTables::eloquent($dataDb)
        		->editColumn('sk_file_jabatan', function($dataDb) {
        			return '<img src="'.url($dataDb->sk_file_jabatan).'" alt="sk file jabatan" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; height:100px; cursor:pointer;" onClick=viewImage(\''.url(str_replace('\\', '/',$dataDb->sk_file_jabatan)).'\')>';
        		})
                ->addColumn('action', function($dataDb) {
                    return '<a href="'.route('kepegawaian.jabatan.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>
                            <a href="#" data-href="'.route('kepegawaian.jabatan.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>
                            <a href="'.route('kepegawaian.jabatan.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>';
                })
                ->rawColumns(['action', 'sk_file_jabatan'])
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

            $riwayatPendidikan = Jabatan::select('user_id')->get();

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
        $find = Jabatan::find($id);
        
        #this delete image
        $this->deleteImage($find->sk_file_jabatan);

        return Jabatan::find($id)->delete();

    }

}