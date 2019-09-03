<?php

namespace App\Http\Controllers\Backend;

// use Illuminate\Http\Request;
use App\Http\Requests\Auth\loginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


use App\Services\Pegawai\PegawaiServiceContract;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showFormLogin()
    {
    	return view('auth.login');
    }

    public function processLogin(loginRequest $request)
    {
        // dd($request->all());
    	$credentials = [
    		'username' => $request->username,
    		'password' => $request->password,
    	];

    	if ( Auth::attempt($credentials) ) {
    		# code...
    		return redirect()->route('dashboard');
    	} else {
            return redirect()->back()->withErrors(['msg', 'The Message']);
        }
    }
}
