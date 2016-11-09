<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
	{
		return $this->belongsToMany('assetManager\Models\User', 'user_role', 'role_id', 'user_id');
	}
}
