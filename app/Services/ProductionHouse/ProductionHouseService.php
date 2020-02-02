<?php

namespace App\Services\ProductionHouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductionHouse;
use App\Traits\FileUploadTrait;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ProductionHouseService implements ProductionHouseServiceContract
{
    use FileUploadTrait;

    public function get($id)
    {
        return ProductionHouse::where('id',$id)->with('movies')->first();
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            #save To DB...
            $folderName = 'mutasi';
    
            $store = new ProductionHouse();
            $store->name                 = $request->name;
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
            $edit = ProductionHouse::find($request->id);

            $dataUpdate = [
                'name'      => $request->name,
            ];

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
            'ProductionHouse.id', 'ProductionHouse.name'
        ];

        $dataDb = ProductionHouse::select($select)->with('movies');

        return DataTables::eloquent($dataDb)
                ->addColumn('action', function($dataDb) {
                    
                    $delete = '<a href="#" data-href="'.route('production_house.delete', $dataDb->id).'" title="hapus" onClick="hapusData(\''.$dataDb->id.'\')"><i class="material-icons">clear</i></a>';
                    $update = '<a href="'.route('production_house.update', $dataDb->id).'" data-tooltip="ubah" data-position="top" class="tooltipped"><i class="material-icons">autorenew</i></a>';
                    $lihat = '<a href="'.route('production_house.show', $dataDb->id).'" title="lihat" onCLick="viewData(\''.$dataDb->id.'\')"><i class="material-icons">remove_red_eye</i></a>';

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

            $dataDb = ProductionHouse::select('id', DB::raw("name as text"))
                // ->where('email', 'LIKE', '%'.$request->term.'%')
                ->where('name', 'LIKE', '%'.$request->term.'%')
                ->orderBy('id')->paginate($perPage);

            return $dataDb;

        } catch (\Exception $exception) {

            // dd($exception->getMessage());
            return $exception->getCode();
        }
    }

    public function delete($id)
    {
        return ProductionHouse::find($id)->delete();
    }

}