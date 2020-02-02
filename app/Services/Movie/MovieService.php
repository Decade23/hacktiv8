<?php

namespace App\Services\Movie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\UserProfile;
use App\Traits\FileUploadTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;
use File;
use Illuminate\Support\Facades\Auth;

class MovieService implements MovieServiceContract
{
    use FileUploadTrait;

    public function get($id)
    {
        return Movie::where('id',$id)->with('ProductionHouses')->first();
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $folderName = 'jabatan';
    
            $store = new Movie();
            $store->movie                 = $request->movie;
            $store->genre                 = $request->genre;
            $store->productionHouseId     = $request->phSearch;

            $store->save();

            // dd($store);
            
            #create User Login
            // $this->storeUserCredentials($request);
            
            DB::commit();
            return $store;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
//            dd($e->getMessage().' '.$e->getLine());
            return $e->getCode();
        }
    }

    public function edit($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $edit = Movie::find($request->id);

            $dataUpdate = [
                'movie'             => $request->movie,
                'genre'             => $request->genre,
                'productionHouseId' => $request->phSearch,
                
            ];

            // dd(array_merge($dataUpdate, $pushArray));
            $edit->update($dataUpdate);
            
            DB::commit();
            return $edit;
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
//            dd($e->getMessage().' '.$e->getLine());
            return $e->getCode();
        }
    }

    public function datatables($request)
    {
        $select = [
            'Movie.id', 'Movie.genre', 'Movie.movie','Movie.productionHouseId'
        ];

        $dataDb = Movie::select($select)->with('ProductionHouses');

        return DataTables::eloquent($dataDb)

                ->addColumn('action', function($dataDb) {
                    $update = '';
                    $delete = '';
                    $lihat  = '';

                    $delete = '<a href="#" data-href="'.route('movie.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                    $update = '<a href="'.route('movie.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';
                    $lihat = '<a href="'.route('movie.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>';


                    return $update.$lihat.$delete;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function delete($id)
    {
        return Movie::find($id)->delete();
    }

}