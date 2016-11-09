<?php

namespace assetManager\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
	use Authenticatable;
	
	protected $table = 'users';
	
    protected $fillable = [
		'first_name', 
		'last_name', 
		'email',
		'pnc',
		'username',
		'status',
		'password', 
	];

    protected $hidden = [
		'password',
		'remember_token',
	];
	
	public function roles()
	{
		return $this->belongsToMany('assetManager\Models\Role', 'user_role', 'user_id', 'role_id'); 
	}
	
	public function hasAnyRole($roles)
	{
		if (is_array($roles)) {
			foreach($roles as $role) {
				if ($this->hasRole($role)) {
					return true;
				}
			}
		} else {
			if ($this->hasRole($roles)) {
				return true;
			}
		}
		return false;
	}
	
	public function hasRole($role)
	{
		if ($this->roles()->where('name', $role)->first()) {
			return true;
		}
		return false;
	}
	
	public function isUser() 
	{
		if ($this->roles()->where('name', 'User')->first()) {
			return true;
		}
		return false;
	}
	
	public function isAdmin() 
	{
		if ($this->roles()->where('name', 'Admin')->first()) {
			return true;
		}
		return false;
	}
	
	public function isEditor() 
	{
		if ($this->roles()->where('name', 'Editor')->first()) {
			return true;
		}
		return false;
	}
	
	public function canCUD() 
	{
		if($this->isAdmin() || $this->isEditor()) {
			return true;
		}
		return false;
	}
	
}