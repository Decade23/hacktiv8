<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Pegawai\pegawaiRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\Pegawai\PegawaiServiceContract;

class PegawaiController extends Controller
{
    use RedirectTo;

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
    	return view('backend.pegawai.index');
    }

    public function create()
    {
        return view('backend.pegawai.create');
    }

    public function store(pegawaiRequest $request, PegawaiServiceContract $pegawaiServiceContract)
    {   
        // dd($request->all());
        if (is_object($pegawaiServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('pegawai.index'), $request->nama);
        }
    	return $this->redirectFailed(route('pegawai.index'), 'Gagal Menyimpan Data Pegawai');
    }

    public function update($id, PegawaiServiceContract $pegawaiServiceContract)
    {   
        // dd($pegawaiServiceContract->get($id));
        $dataDb = $pegawaiServiceContract->get($id);
        // dd($dataDb->status_kawin);
        return view('backend.pegawai.update', compact( 'dataDb' ) );
    }

    public function edit(pegawaiRequest $request, PegawaiServiceContract $pegawaiServiceContract)
    {   
        // dd($request->all());
        if (is_object($pegawaiServiceContract->edit($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('pegawai.index'), $request->nama);
        }
        return $this->redirectFailed(route('pegawai.index'), 'Gagal Menyimpan Data Pegawai');
    }

    public function datatables(Request $request, PegawaiServiceContract $pegawaiServiceContract)
    {
        if ($request->ajax()) {
            # code...
            return $pegawaiServiceContract->datatables($request);
        }

        abort('404', 'uups');

    }

    public function select2(Request $request, PegawaiServiceContract $pegawaiServiceContract){

        if ($request->ajax() === true) {

            return $pegawaiServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }
}
