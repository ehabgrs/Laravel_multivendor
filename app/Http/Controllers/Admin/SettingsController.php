<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class SettingsController extends Controller
{
    public function edit_shipping_methods($method)
	{
		$shipping_methods = ['free_shipping','local_shipping', 'international_shipping'];
		
		if(!in_array($method, $shipping_methods) ) {
			return redirect('admin/');
		}
		
		
		$shipping_method = Setting::where('key',$method)->first();
		
		return view('admin/settings/shippings/edit',compact($shipping_method));
			
	}
	
	public function update_shipping_methods(Request $request, $id)
	{
		
	}
}
