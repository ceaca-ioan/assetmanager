<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;

class Personalphone extends Model
{
	protected $fillable = [
		'id', 
		'employee_id',
		'mark', 
		'model',
		'notes',
	];
	
    public function employee()
	{
		return $this->belongsTo('assetManager\Models\Employee');
	}
}
