<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMobileVerification extends Model
{
    use HasFactory;
	public $table = 'users_mobile_verification';
	protected $fillable = ['user_id','code'];
	
}
