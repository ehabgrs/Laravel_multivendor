<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Tag extends Model
{
    use HasFactory;
	use Translatable;

	protected $fillable = ['slug'];
	
	protected $with = ['translations'];
	
	protected $translatedAttributes = ['name'];
	
	
}
