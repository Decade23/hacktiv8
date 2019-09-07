<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\RiwayatPendidikan\riwayatpendidikanRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\RiwayatPendidikan\RiwayatPendidikanServiceContract;

class RiwayatController extends Controller
{
    use RedirectTo;

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
    	return view('backend.riwayat_pendidikan.index');
    }

    public function create()
    {
        // return 'coba';
        return view('backend.riwayat_pendidikan.create');
    }

    public function store(Request $request, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract)
    {   
        // dd($request->file('fileIjazah'));
        if (is_object($riwayatPendidikanServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('riwayat_pendidikan.index'), $request->nama);
        }
    	return $this->redirectFailed(route('riwayat_pendidikan.create'), 'Gagal Menyimpan Data Pegawai');
    }

    public function update($id, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract)
    {   
        $dataDb = $riwayatPendidikanServiceContract->get($id);
        
        return view('backend.riwayat_pendidikan.update', compact( 'dataDb' ) );
    }

    public function show($id, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract)
    {
        $dataDb = $riwayatPendidikanServiceContract->get($id);

        return view('backend.riwayat_pendidikan.show', compact( 'dataDb' ));
    }

    public function delete(Request $request, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract)
    {   
        $riwayatPendidikanServiceContract->delete($request->id);

        return $this->redirectSuccessDelete(route('riwayat_pendidikan.index'), 'Data');
    }

    public function edit(riwayatpendidikanRequest $request, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract)
    {   
        // dd($request->all());
        if (is_object($riwayatPendidikanServiceContract->edit($request))) {
            # bump...
            return $this->redirectSuccessUpdate(route('riwayat_pendidikan.index'), $request->nama);
        }
        return $this->redirectFailed(route('riwayat_pendidikan.update', $request->id), 'Gagal Menyimpan Data Pegawai');
    }

    public function datatables(Request $request, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract)
    {
        if ($request->ajax()) {
            # code...
            return $riwayatPendidikanServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }

    public function select2(Request $request, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract){

        if ($request->ajax() === true) {

            return $riwayatPendidikanServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }
}
