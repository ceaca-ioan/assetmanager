<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function departments()
	{
		return $this->hasMany('assetManager\Models\Department'); 
	}
	
	public static function getOrganizationNames()
	{
		$organization_obj_array = Organization::all();
		foreach ($organization_obj_array as $organization_obj) {
			$organizations[] = $organization_obj->name;
		}
		return $organizations;
	}
	
	
}
