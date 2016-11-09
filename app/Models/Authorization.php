<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
	protected $fillable = [
		'employee_id',
		'sn', 
		'authorization_level',
		'issue_date',
		'expiry_date',
	];
	
    public function employee()
	{
		return $this->belongsTo('assetManager\Models\Employee');
	}
	
	public static function authorization_levels()
	{
		return collect(['Secret de serviciu'=>'Secret de serviciu', 'Secret'=>'Secret', 'Strict secret'=>'Strict secret']);
	}
}
