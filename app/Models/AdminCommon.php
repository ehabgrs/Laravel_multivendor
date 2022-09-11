<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCommon extends Model
{	
	public function scopeActive($query)
	{
		return $query->where('is_active',1);
	}
	
	public function is_active($request)
	{
		if(!$request-> has('is_active')) {
			$request->request->add(['is_active' => 0]);
		}
		return $request;
	}
	
	public function get_active()
	{
		return $this->is_active == 0 ? 'Not Active' : 'Active';
	}
}
