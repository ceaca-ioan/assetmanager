<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function department()
	{
		return $this->belongsTo('assetManager\Models\Department');
	}
	
	public function address()
	{
		return $this->belongsTo('assetManager\Models\Address');
	}
}
