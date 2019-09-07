<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Mutasi\mutasiRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\Mutasi\MutasiServiceContract;

class MutasiController extends Controller
{
    use RedirectTo;

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.mutasi.index');
    }

    public function create()
    {
        // return 'coba';
        return view('backend.mutasi.create');
    }

    public function store(mutasiRequest $request, MutasiServiceContract $mutasiServiceContract)
    {   
        // dd($request->file('fileIjazah'));
        if (is_object($mutasiServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('mutasi.index'), $request->nama);
        }
        return $this->redirectFailed(route('mutasi.create'), 'Gagal Menyimpan Data Pegawai');
    }

    public function update($id, MutasiServiceContract $mutasiServiceContract)
    {   
        $dataDb = $mutasiServiceContract->get($id);
        
        return view('backend.mutasi.update', compact( 'dataDb' ) );
    }

    public function show($id, MutasiServiceContract $mutasiServiceContract)
    {
        $dataDb = $mutasiServiceContract->get($id);

        return view('backend.mutasi.show', compact( 'dataDb' ));
    }

    public function delete(Request $request, MutasiServiceContract $mutasiServiceContract)
    {   
        $mutasiServiceContract->delete($request->id);

        return $this->redirectSuccessDelete(route('mutasi.index'), 'Data');
    }

    public function edit(mutasiRequest $request, MutasiServiceContract $mutasiServiceContract)
    {   
        // dd($request->all());
        if (is_object($mutasiServiceContract->edit($request))) {
            # bump...
            return $this->redirectSuccessUpdate(route('mutasi.index'), $request->nama);
        }
        return $this->redirectFailed(route('mutasi.update', $request->id), 'Gagal Menyimpan Data Pegawai');
    }

    public function datatables(Request $request, MutasiServiceContract $mutasiServiceContract)
    {
        if ($request->ajax()) {
            # code...
            return $mutasiServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }

    public function select2(Request $request, MutasiServiceContract $mutasiServiceContract){

        if ($request->ajax() === true) {

            return $mutasiServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }
}
