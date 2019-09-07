<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Jabatan\jabatanRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\Jabatan\JabatanServiceContract;

class JabatanController extends Controller
{
    use RedirectTo;

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.kepegawaian.jabatan.index');
    }

    public function create()
    {
        // return 'coba';
        return view('backend.kepegawaian.jabatan.create');
    }

    public function store(jabatanRequest $request, JabatanServiceContract $jabatanServiceContract)
    {   
        // dd($request->file('fileIjazah'));
        if (is_object($jabatanServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('kepegawaian.jabatan.index'), $request->nama);
        }
        return $this->redirectFailed(route('kepegawaian.jabatan.create'), 'Gagal Menyimpan Data Pegawai');
    }

    public function update($id, JabatanServiceContract $jabatanServiceContract)
    {   
        $dataDb = $jabatanServiceContract->get($id);
        
        return view('backend.kepegawaian.jabatan.update', compact( 'dataDb' ) );
    }

    public function show($id, JabatanServiceContract $jabatanServiceContract)
    {
        $dataDb = $jabatanServiceContract->get($id);

        return view('backend.kepegawaian.jabatan.show', compact( 'dataDb' ));
    }

    public function delete(Request $request, JabatanServiceContract $jabatanServiceContract)
    {   
        $jabatanServiceContract->delete($request->id);

        return $this->redirectSuccessDelete(route('kepegawaian.jabatan.index'), 'Data');
    }

    public function edit(jabatanRequest $request, JabatanServiceContract $jabatanServiceContract)
    {   
        // dd($request->all());
        if (is_object($jabatanServiceContract->edit($request))) {
            # bump...
            return $this->redirectSuccessUpdate(route('kepegawaian.jabatan.index'), $request->nama);
        }
        return $this->redirectFailed(route('backend.kepegawaian.jabatan.update', $request->id), 'Gagal Menyimpan Data Pegawai');
    }

    public function datatables(Request $request, JabatanServiceContract $jabatanServiceContract)
    {
        if ($request->ajax()) {
            # code...
            return $jabatanServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }

    public function select2(Request $request, JabatanServiceContract $jabatanServiceContract){

        if ($request->ajax() === true) {

            return $jabatanServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }
}
