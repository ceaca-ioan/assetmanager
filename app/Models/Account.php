<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
	use SoftDeletes;
	
	public $incrementing = false;
	
	protected $fillable = [
		'id', 
		'employee_id',
		'type',
		'cis_name', 
		'approval_number',
		'approval_date',
		'status',
		'notes',
	];
	
	protected $dates = ['deleted_at'];
	
	public function computers()
	{
		return $this->belongsToMany('assetManager\Models\Computer', 'computer_account', 'account_id', 'computer_id');
	}
	
    public function employee()
	{
		return $this->belongsTo('assetManager\Models\Employee');
	}
	
	public function cis()
	{
		return $this->belongsTo('assetManager\Models\Cis');
	}
}
