<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLogInResquest;

class AuthController extends Controller
{
    public function login()
	{
		return view('admin/login');
	}
	
	public function post_login(AdminLogInResquest $request)
	{
		$remember_me = $request->has('remember_me') ? true : false;
		if(auth()->guard('admin')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')] , $remember_me))
		{
			return redirect() -> route('admin')->with(['success' => 'Logged in successfully']);
		}
		
		return redirect()->back()->with(['error' => 'The email or the password is not correct']);
	}
	
	public function logout()
	{
		auth('admin')->logout();
		return redirect()->route('admin.login');
		
	}
}
