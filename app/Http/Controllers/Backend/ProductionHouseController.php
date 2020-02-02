<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ProductionHouse\productionHouseRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\ProductionHouse\ProductionHouseServiceContract;

class ProductionHouseController extends Controller
{
    use RedirectTo;

    public function __construct()
    {
        
    }

    public function index()
    {
        return view('backend.production_house.index');
    }

    public function create()
    {
        // return 'coba';
        return view('backend.production_house.create');
    }

    public function store(productionHouseRequest $request, ProductionHouseServiceContract $productionHouseServiceContract)
    {   
        // dd($request->file('fileIjazah'));
        if (is_object($productionHouseServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('production_house.index'), $request->name);
        }
        return $this->redirectFailed(route('production_house.create'), 'Gagal Menyimpan Data Production House');
    }

    public function update($id, ProductionHouseServiceContract $productionHouseServiceContract)
    {   
        $dataDb = $productionHouseServiceContract->get($id);
        
        return view('backend.production_house.update', compact( 'dataDb' ) );
    }

    public function show($id, ProductionHouseServiceContract $productionHouseServiceContract)
    {
        $dataDb = $productionHouseServiceContract->get($id);

//        dd($dataDb);

        return view('backend.production_house.show', compact( 'dataDb' ));
    }

    public function delete(Request $request, ProductionHouseServiceContract $productionHouseServiceContract)
    {   
        $productionHouseServiceContract->delete($request->id);

        return $this->redirectSuccessDelete(route('production_house.index'), 'Data');
    }

    public function edit(productionHouseRequest $request, ProductionHouseServiceContract $productionHouseServiceContract)
    {   
        // dd($request->all());
        if (is_object($productionHouseServiceContract->edit($request))) {
            # bump...
            return $this->redirectSuccessUpdate(route('production_house.index'), $request->nama);
        }
        return $this->redirectFailed(route('production_house.update', $request->id), 'Gagal Menyimpan Data Pegawai');
    }

    public function datatables(Request $request, ProductionHouseServiceContract $productionHouseServiceContract)
    {
        if ($request->ajax()) {
            # code...   
            return $productionHouseServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }

    public function select2(Request $request, ProductionHouseServiceContract $productionHouseServiceContract){

        if ($request->ajax() === true) {

            return $productionHouseServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }
}
