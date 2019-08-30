<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Pegawai\PegawaiServiceContract;

class PegawaiController extends Controller
{
    public function index()
    {
    	return view('backend.pegawai.index');
    }

    public function store(Request $request, PegawaiServiceContract $pegawaiServiceContract)
    {
        if (is_object($pegawaiServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('pegawai.index'), $request->nama);
        }
    	return $this->redirectFailed(route('pegawai.index'), 'Gagal Menyimpan Data Pegawai');
    }
}
