<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usbtoken extends Model
{
	use SoftDeletes;
	
    public $incrementing = false;
	
	protected $fillable = [
		'id', 
		'employee_id', 
		'mark_model',
		'classification_level',
		'registration_no',
		'registration_date',
		'history',
		'notes',
	];
	
	protected $dates = ['deleted_at'];
	
    public function employee()
	{
		return $this->belongsTo('assetManager\Models\Employee');
	}
	
    
}
