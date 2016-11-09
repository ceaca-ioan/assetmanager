<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function organization()
	{
		return $this->belongsTo('assetManager\Models\Organization');
	}
	
	public function sections()
	{
		return $this->hasMany('assetManager\Models\Section'); 
	}
}
