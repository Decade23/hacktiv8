<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\RedirectTo;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use RedirectTo;

    public function __construct()
    {
//        return $this->middleware('auth');
    }

    public function index()
    {
//    	$dataDb = Jabatan::select('jabatan', DB::raw('count(*) as total'))->doesntHave('mutasi_user')->with('mutasi_user')->orWhereHas('mutasi_user', function($query){
//            $query->where('jenis_mutasi','!=', 'mutasi keluar');
//        })->groupBy('jabatan')->get();
    	// dd($dataDb);
        return view('dashboard');
    }
}
