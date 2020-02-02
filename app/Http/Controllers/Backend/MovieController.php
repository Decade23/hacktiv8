<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Movie\movieRequest;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;

use App\Services\Movie\MovieServiceContract;

class MovieController extends Controller
{
    use RedirectTo;

    public function __construct()
    {

    }

    public function index()
    {
        return view('backend.movie.index');
    }

    public function create()
    {
        // return 'coba';
        return view('backend.movie.create');
    }

    public function store(movieRequest $request, MovieServiceContract $movieServiceContract)
    {   
        // dd($request->file('fileIjazah'));
        if (is_object($movieServiceContract->store($request))) {
            # bump...
            return $this->redirectSuccessCreate(route('movie.index'), $request->nama);
        }
        return $this->redirectFailed(route('movie.create'), 'Gagal Menyimpan Data Pegawai');
    }

    public function update($id, MovieServiceContract $movieServiceContract)
    {   
        $dataDb = $movieServiceContract->get($id);
        
        return view('backend.movie.update', compact( 'dataDb' ) );
    }

    public function show($id, MovieServiceContract $movieServiceContract)
    {
        $dataDb = $movieServiceContract->get($id);

        return view('backend.movie.show', compact( 'dataDb' ));
    }

    public function delete(Request $request, MovieServiceContract $movieServiceContract)
    {   
        $movieServiceContract->delete($request->id);

        return $this->redirectSuccessDelete(route('movie.index'), 'Data');
    }

    public function edit(movieRequest $request, MovieServiceContract $movieServiceContract)
    {   
        // dd($request->all());
        if (is_object($movieServiceContract->edit($request))) {
            # bump...
            return $this->redirectSuccessUpdate(route('movie.index'), $request->nama);
        }
        return $this->redirectFailed(route('backend.movie.update', $request->id), 'Gagal Menyimpan Data Pegawai');
    }

    public function datatables(Request $request, MovieServiceContract $movieServiceContract)
    {
//        dd($movieServiceContract->datatables($request));
        if ($request->ajax()) {
            # code...
            return $movieServiceContract->datatables($request);
        }

        return abort(404, 'uups');

    }
}
