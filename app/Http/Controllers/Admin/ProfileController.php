<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProfileRequest;
use App\Http\Requests\Admin\ProfilePasswordRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
	{
		$admin_id = auth('admin')->user()->id;
		
		$admin = Admin::find($admin_id);
		
		return view('admin/profile/edit',compact('admin'));
	}
	
	public function update(ProfileRequest $request)
	{
		
			$admin_id = auth('admin')->user()->id;
			
			$admin = Admin::find($admin_id);
			
			$admin -> update($request->only(['name','email']));
			
			return redirect()->back()->with(['success'=> 'The profile has been updated successfully']);
			
		
	}
	
	public function edit_password()
	{
		return view('admin.profile.password');
	}
	
	public function update_password(ProfilePasswordRequest $request)
	{
		$admin_id = auth('admin')->user()->id;
		$admin = Admin::find($admin_id);
		
		if (!Hash::check($request->old_password, $admin->password)) { 
		  $admin->update(['password' => bcrypt($request->new_password)]);
		  return redirect()->back()->with(['success'=>'Password has been changed successfully']);
		}
		return redirect()->back()->with(['error'=>'Old password is not correct']);
	}
}
