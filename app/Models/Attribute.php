<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Attribute extends Model
{
    use HasFactory,Translatable;
	
	protected $with = ['translations'];
	
	protected $translatedAttributes = ['name'];
}
