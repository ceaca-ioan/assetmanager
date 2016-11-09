<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Cis extends Model
{
    public function accounts()
	{
		return $this->hasMany('assetManager\Models\Account'); 
	}
	
	public function computers()
	{
		return $this->hasMany('assetManager\Models\Computer'); 
	}
	
	public static function getCisNames()
	{
		$cis_obj_array = Cis::all();
		foreach ($cis_obj_array as $cis_obj) {
			$cis_names[] = $cis_obj->name;
		}
		return $cis_names;
	}
}
