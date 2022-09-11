<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//DATABASE TRANSLATION PACKAGE
use Astrotomic\Translatable\Translatable;

class Setting extends Model
{
    use HasFactory;
	
	use Translatable;
	
	//define the columns values will be translated in the translation table 
	protected $translatedAttributes = ['value'];
	
	//to return the table with the translation
	protected $with = ['translations'];
	
	protected $fillable = ['key','is_translatable','plain_value'];
	
	//cast column value to another type
	protected $casts = [
		'is_translatable' => 'boolean',
	];
	
	
	/////////////////functions for translation package///////////////
	public static function setMany($settings)
	{
		foreach($settings as $key => $value) {
			self::set($key,$value);
		}
	}
	
	
	public static function set($key, $value)
	{
		//if translatable we will add it for the settings table and set translatable to true
		if($key == 'translatable') {
			return static::setTranslatableSettings($value);
		}
		
		//in case the value is array we will change it to json to can be stored at the database
		if(is_array($value)) {
			$value = json_encode($value);
		}
		
		//if not translatable we will just add it for the settings table
		//updateOrCreate laravel method
		//updateOrCreate([the first values we want to check if it is there we will upadte and if not will be create],[the rest of values])
		static::updateOrCreate(['key' => $key] , ['plain_value' => $value] );
	}
	
	public static function setTranslatableSettings($array = [])
	{
		foreach($array as $key => $value){
			static::updateOrCreate(
			['key' => $key],
			//here we will write value column from the translation table not plain_value , plain_value will be null here
			//it will add the value at the translation table as we defined value up at $translatedAttributes
			[
			  'is_translatable' => true,
			  'value'  => $value,
			]);
		}
	}	
	////////////////////end of the functions for translation package////////////////////
}
