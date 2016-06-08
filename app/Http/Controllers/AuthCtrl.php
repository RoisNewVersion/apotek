<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
// use App\Http\Requests\RulesRepository;
use Request;
use Session;
use UxWeb\SweetAlert\SweetAlert;

class AuthCtrl extends Controller
{
	public function getLogon()
	{
		return view('pages.login');
	}

    public function postLogon()
    {
    	$validator = Validator::make(Request::all(), $this->rules());

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator);
    	}

    	$email = Request::input('email');
    	$pass = Request::input('password');

    	if (Auth::attempt($this->input()/*['email'=>$email, 'password'=>$pass]*/)) {
    		SweetAlert::success('Welcome Back '.Auth::user()->name, 'Selamat Datang')->autoclose(2000);
    		return redirect()->intended('home');
    	}else{
    		Session::flash('pesan', 'E-mail atau password salah, coba lagi!');
    		return redirect()->back();
    	}
    }

    //logout
    public function getLogout()
    {
    	Session::forget('datatambahobat');
        Session::forget('dataprint');
    	SweetAlert::message('Good bye '.Auth::user()->name)->autoclose(2000);
    	Auth::logout();
    	return redirect('home');
    }

    //retrieving input
    public function input()
    {
    	return [
    		'email' => Request::input('email'),
    		'password' => Request::input('password')
    	];
    }

    public function rules()
    {
        return [
            'email'=>'required|email',
            'password'=>'required'
        ];
    }
}
