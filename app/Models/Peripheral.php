<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peripheral extends Model
{
	use SoftDeletes;
	
	public $incrementing = false;
	
	protected $fillable = [
		'id', 
		'type', 
		'mark',
		'model',
		'sn',
		'destination',
		'computer_id',
		'history',
		'reason_for_delete',
	];
	
	protected $dates = ['deleted_at'];
	
    public function computer()
	{
		return $this->belongsTo('assetManager\Models\Computer');
	}
}
