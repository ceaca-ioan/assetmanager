<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Networkprinter extends Model
{
	use SoftDeletes;
	
    public $incrementing = false;
	
	protected $fillable = [
		'id', 
		'ip', 
		'name',
		'inv_no',
		'organization',
		'department',
		'section', 
		'address_name', 
		'room', 
		'cis_name', 
		'mark', 
		'model', 
		'mac', 
		'sn',
		'provenance',
		'ai', 
		'history',
		'notes',
	];

	protected $dates = ['deleted_at'];
	
	public function computers()
	{
		return $this->belongsToMany('assetManager\Models\Computer', 'computer_networkprinter', 'networkprinter_id', 'computer_id');
	}
	
	
}
