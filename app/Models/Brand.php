<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\AdminCommon;

class Brand extends AdminCommon
{
    use HasFactory;
	use Translatable;
	
	protected $with = ['translations'];
	
	protected $fillable = ['is_active','photo'];
	
	protected $hidden = ['translations'];
	
	protected $translatedAttributes = ['name'];
	
	protected $casts = [
		'is_active' => 'boolean',
	];
	
	public function get_active()
	{
		return $this->is_active == 0 ? 'Not Active' : 'Active';
	}
	
	/*public function scopeActive($query)
	{
		return $query->where('is_active',1);
	}*/
}
