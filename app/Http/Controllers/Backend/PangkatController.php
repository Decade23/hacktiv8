<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Pangkat\pangkatRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\Pangkat\PangkatServiceContract;

class PangkatController extends Controller
{
    use RedirectTo;

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.kepegawaian.pangkat.index');
    }

    public function create()
    {
        // return 'coba';
        return view('backend.kepegawaian.pangkat.create');
    }

    public function store(pangkatRequest $request, PangkatServiceContract $pangkatServiceContract)
    {   
        // dd($request->file('fileIjazah'));
        if (is_object($pangkatServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('kepegawaian.pangkat.index'), $request->nomor_sk);
        }
        return $this->redirectFailed(route('kepegawaian.pangkat.create'), 'Gagal Menyimpan Data Pegawai');
    }

    public function update($id, PangkatServiceContract $pangkatServiceContract)
    {   
        $dataDb = $pangkatServiceContract->get($id);
        
        return view('backend.kepegawaian.pangkat.update', compact( 'dataDb' ) );
    }

    public function show($id, PangkatServiceContract $pangkatServiceContract)
    {
        $dataDb = $pangkatServiceContract->get($id);

        return view('backend.kepegawaian.pangkat.show', compact( 'dataDb' ));
    }

    public function delete(Request $request, PangkatServiceContract $pangkatServiceContract)
    {   
        $pangkatServiceContract->delete($request->id);

        return $this->redirectSuccessDelete(route('kepegawaian.pangkat.index'), 'Data');
    }

    public function edit(pangkatRequest $request, PangkatServiceContract $pangkatServiceContract)
    {   
        // dd($request->all());
        if (is_object($pangkatServiceContract->edit($request))) {
            # bump...
            return $this->redirectSuccessUpdate(route('kepegawaian.pangkat.index'), $request->nomor_sk);
        }
        return $this->redirectFailed(route('kepegawaian.pangkat.update', $request->id), 'Gagal Memperbaharui Data Pegawai');
    }

    public function datatables(Request $request, PangkatServiceContract $pangkatServiceContract)
    {
        if ($request->ajax()) {
            # code...
            return $pangkatServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }

    public function select2(Request $request, PangkatServiceContract $pangkatServiceContract){

        if ($request->ajax() === true) {

            return $pangkatServiceContract->select2($request);
        }

        return abort('404', 'uups');
    }
}
