<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EditShippingRequest;
use App\Models\Setting;
use DB;
class SettingsController extends Controller
{
    public function edit_shipping_methods($method)
	{
		$shipping_methods = ['free_shipping','local_shipping', 'international_shipping'];
		
		if(!in_array($method, $shipping_methods) ) {
			return redirect('admin/');
		}
		
		
		$shipping_method = Setting::where('key',$method)->first();
		
		return view('admin/settings/shippings/edit',compact('shipping_method'));
			
	}
	
	public function update_shipping_methods(EditShippingRequest $request, $id)
	{
		try{
			
			DB::beginTransaction();
			
			$shipping_method = Setting::find($request->id);
		
			$shipping_method->update(['plain_value' => $request->cost]);
			
			//the package will set the translation in translation table by this way
			//will set the locale defautly for our current locale
			$shipping_method->value = $request->name;
			
			//if we want select the locale manually use this
			//$shipping_method->translation('en')->value = $request->name;
			
			$shipping_method->save();
			
			DB::commit();
		
			return redirect('admin/')->with(['success' => 'The shipping method updated successfully']);
		
		} catch(\Exception $ex) {
			//reverse all what between DB::beginTransaction() and DB::commit()
			DB::rollback();
			return redirect()->back()->with(['error' => $ex]);
			
		}
		
		
	}  
}
