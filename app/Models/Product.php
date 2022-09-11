<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AdminCommon;

class Product extends AdminCommon
{
    use HasFactory,SoftDeletes,Translatable;
	
	protected $with = ['translations'];
	
	protected $fillable = [
		'slug',
		'brand_id',
		'price',
		'special_price',
		'special_price_type',
		'special_price_start',
		'special_price_end',
		'selling_price',
		'sku',
		'manage_stock',
		'qty',
		'views',
		'is_active',
	];
	
	
	protected $translatedAttributes = [
		'name',
		'description',
		'short_description'
	];
	
	protected $casts = [
		'is_active'		 => 'boolean',
		'manage_stock'   => 'boolean',
	];
	
	protected $dates = [
		'special_price_end',
		'special_price_start',
		'deleted_at',
	];
	
	
	public function brand()
	{
		//withDefault() if doesn't have a brand return the default in the table to not return error
		return $this->belongsTo(Brand::class,'brand_id')->withDefault();
	}
	
	public function categories()
	{
		return $this->belongsToMany(Category::class,'product_categories');
	}
	
	public function tags()
	{
		return $this->belongsToMany(Tag::class,'product_tags');
	}
	
	public function images()
	{
		return $this->hasMany(ProductImage::class,'product_id');
	}
	
	public function hasStock($quantity)
    {
        return $this->qty >= $quantity;
    }

    public function outOfStock()
    {
        return $this->qty === 0;
    }

    public function inStock()
    {
        return $this->qty >= 1;
    }
	
	//for basket , to check and change name
	public function getTotal($converted = true)
    {
        return $total =  $this->special_price ?? $this -> price;

    }
	
	public function getPrice()
    {
		if($this->special_price && strtotime($this->special_price_start) <=  strtotime(date("Y-m-d")) && strtotime($this->special_price_end) >=  strtotime(date("Y-m-d"))) {
			
			return $this->special_price;
			
		}
		
        return $this -> price;

    }
	
}


