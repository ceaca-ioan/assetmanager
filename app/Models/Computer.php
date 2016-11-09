<?php

namespace assetManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use assetManager\Models\Networkprinter;
use assetManager\Models\Account;
use assetManager\Models\Employee;

class Computer extends Model
{
	use SoftDeletes;
	
	public $incrementing = false;
	
	protected $fillable = [
		'id', 
		'ip', 
		'name',
		'inv_no',
		'holder',
		'provenance',
		'ai',
		'organization',
		'department',
		'section', 
		'address_name', 
		'room', 
		'os', 
		'cis_name', 
		'hdd_reg_no', 
		'hdd_reg_date', 
		'hdd_sn',
		'hdd_mark_and_model',
		'hdd_capacity', 
		'hdd_interface',
		'optical_drive',
		'type',
		'processor_type',
		'processor_frequency',
		'motherboard',
		'sn',
		'ram_capacity',
		'ram_type',
		'mac',
		'optical_drive_rights',
		'soft_rights',
		'privileged_accounts',
		'usb_rights',
		'history',
		'notes',
		'reason_for_delete',
		'accounts_history',
		'peripherals_history',
		'networkprinters_history',
	];
	
	protected $dates = ['deleted_at'];
	
    public function networkprinters()
	{
		return $this->belongsToMany('assetManager\Models\Networkprinter', 'computer_networkprinter', 'computer_id', 'networkprinter_id');
	}
	
	public function accounts()
	{
		return $this->belongsToMany('assetManager\Models\Account', 'computer_account', 'computer_id', 'account_id');
	}
	
	public function peripherals()
	{
		return $this->hasMany('assetManager\Models\Peripheral');
	}
	
	public function cis()
	{
		return $this->belongsTo('assetManager\Models\Cis');
	}
	
	
	
	public static function accounts_in_department($computer_department, $present_accounts)
	{
		$account_list = array();
		$employees = Employee::where('department', $computer_department)->get();
		foreach($employees as $employee){
			foreach($employee->accounts as $account){
				if (!in_array($account->id, $present_accounts)) {
					$account_list[$account->id] = $account->id;	
				}
				
			}
			
		}
		return $account_list;
	}
	
	public static function networkprinters_in_department($computer_department, $present_networkprinters)
	{
		$networkprinter_list = array();
		$networkprinters = Networkprinter::where('department', $computer_department)->get();
		foreach($networkprinters as $networkprinter){
			if (!in_array($networkprinter->id, $present_networkprinters)) {
				$networkprinter_list[$networkprinter->id] = $networkprinter->id;	
			}
			
		}
		return $networkprinter_list;
	}
	
	
	
	
	
	
}
