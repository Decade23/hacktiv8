<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Pegawai\pegawaiRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\Pegawai\PegawaiServiceContract;

class RiwayatController extends Controller
{
    use RedirectTo;

    public function index()
    {
    	return view('backend.pegawai.index');
    }

    public function create()
    {
        return view('backend.riwayat_pendidikan.create');
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

    public function datatables(Request $request,PegawaiServiceContract $pegawaiServiceContract)
    {
        if ($request->ajax()) {
            # code...
            return $pegawaiServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }
}
