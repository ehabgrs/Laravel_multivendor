<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
	
	protected $table = 'admins';
	
	protected $fillable = ['name','email','password'];  //protected $guards = []  means all columns are fillable
	
	public $timesamps = true;
	
	public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
	
	public function hasPrivilege($permissions)    
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permissions as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } else if (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }
        return false;
    }
	
}
