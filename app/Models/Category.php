<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;

class Category extends AdminCommon
{
    use HasFactory;
	use Translatable;
	
	protected $with = ['translations'];
	protected $translatedAttributes = ['name'];
	
	protected $fillable = ['parent_id','slug','is_active'];
	//we will hide it here and if we need it will call the hidden
	protected $hidden = ['translations'];
	
	protected $casts = [
		'is_active' => 'boolean',
	];
	
	
	public function scopeParent($query)
	{
		return $query->whereNull('parent_id');
	}
	
	public function scopeChild($query)
	{
		return $query->whereNotNull('parent_id');
	}
	
	public function get_active()
	{
		return $this->is_active == 0 ? 'Not Active' : 'Active';
	}
	
	public function _parent()
	{
		return $this->belongsTo(self::class , 'parent_id');
	}
	
	public function childrens()
	{
		return $this->hasMany(self::class,'parent_id');
	}
	
	public function products()
	{
		return $this->belongsToMany(Product::class,'product_categories');
	}
   
}
