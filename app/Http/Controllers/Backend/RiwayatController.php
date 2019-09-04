<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Pegawai\pegawaiRequest;
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

    public function store(pegawaiRequest $request, PegawaiServiceContract $pegawaiServiceContract)
    {   
        // dd($request->all());
        if (is_object($pegawaiServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('pegawai.index'), $request->nama);
        }
    	return $this->redirectFailed(route('pegawai.index'), 'Gagal Menyimpan Data Pegawai');
    }

    public function datatables(Request $request, RiwayatPendidikanServiceContract $riwayatPendidikanServiceContract)
    {
        if ($request->ajax()) {
            # code...
            return $riwayatPendidikanServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }
}
