<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function sections()
	{
		return $this->hasMany('assetManager\Models\Section'); 
	}
}
