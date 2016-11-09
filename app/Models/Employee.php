<?php
namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Employee extends Model 
{
	use SoftDeletes;
	
    public $incrementing = false;
	
	protected $fillable = [
		'id', 
		'first_name', 
		'last_name',
		'father_last_name',
		'rank',
		'position',
		'organization',
		'department',
		'section',
		'work_phone_no',
		'personal_phone_no',
		'notes',
		'reason_for_delete',
		'accounts_history',
		'computers_history',
		'usbtokens_history',
		'personalphones_history',
		'authorizations_history',
	];
	
	protected $dates = ['deleted_at'];
	
	public function usbtokens()
	{
		return $this->hasMany('assetManager\Models\Usbtoken');
	}
	
	public function accounts()
	{
		return $this->hasMany('assetManager\Models\Account'); 
	}
	
	public function personalphones()
	{
		return $this->hasMany('assetManager\Models\Personalphone');
	}
	
	public function authorizations()
	{
		return $this->hasMany('assetManager\Models\Authorization');
	}
	
	public static function ranks()
	{
		return collect(['Agent'=>'Agent', 'Agent principal'=>'Agent principal', 'Agent sef'=>'Agent sef', 'Agent sef adjunct'=>'Agent sef adjunct', 'Agent sef principal'=>'Agent sef principal', 'Subinspector'=>'Subinspector', 'Inspector'=>'Inspector', 'Inspector principal'=>'Inspector principal', 'Subcomisar'=>'Subcomisar', 'Comisar'=>'Comisar', 'Comisar sef'=>'Comisar sef']);
	}
	
	public static function positions()
	{
		return collect(['Agent'=>'Agent', 'Agent principal'=>'Agent principal', 'Agent principal I'=>'Agent principal I', 'Ofiter1'=>'Ofiter1', 'Ofiter2'=>'Ofiter2', 'Ofiter principal'=>'Ofiter principal']);
	}
}
