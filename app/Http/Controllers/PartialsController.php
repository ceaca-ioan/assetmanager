<?php

namespace assetManager\Http\Controllers;

use Illuminate\Http\Request;

use assetManager\Http\Requests;
use assetManager\Models\Networkprinter;
use assetManager\Models\Organization;
use assetManager\Models\Department;
use assetManager\Models\Section;
use assetManager\Models\Address;
use assetManager\Models\Cis;
use assetManager\Models\Usbtoken;
use assetManager\Models\Computer;
use assetManager\Models\Peripheral;
use assetManager\Models\Employee; 
use assetManager\Models\Personalphone;
use assetManager\Models\Authorization;
use assetManager\Models\Account;
use assetManager\Models\Ipaddress;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PartialsController extends Controller
{
	
	
    public function structure(Request $request)
	{	
		if($request['organizations']){
			$organizations = Organization::getOrganizationNames();
			return response()->json(['organizations'=>$organizations]);	
		}
		
		if($request['organization']){
			$organization = Organization::where('name', $request['organization'])->first();
			$departments = Department::where('organization_id', $organization->id)->get();
			return response()->json(['departments'=>$departments]);
		}
		
		
		if($request['department']){
			$department = Department::where('name', $request['department'])->first();
			$sections = Section::where('department_id', $department->id)->get();
			return response()->json(['sections'=>$sections]);
		}
		
		if($request['section']){
			$section = Section::where('name', $request['section'])->first();
			$address = Address::where('id', $section->address_id)->first();
			$id = $request['id'];
			$cis_structures = $request['cis_structures'];
			$ipaddresses = Ipaddress::where('address_id', $section->address_id)->where('cis_name', $cis_structures)->whereIn('allocated_to', [$id, ''])->get();
			return response()->json(['address'=>$address, 'ipaddresses'=>$ipaddresses]);
		}
		
		if($request['cis']){
			$cis_names = Cis::getCisNames();
			return response()->json(['cis_names'=>$cis_names]);	
		}
		
		if($request['cis_changed']){
			$id = $request['id'];
			$section = Section::where('name', $request['section_cis'])->first();
			$ipaddresses = Ipaddress::where('cis_name', $request['cis_changed'])->where('address_id', $section->address_id)->whereIn('allocated_to', [$id, ''])->get();
			return response()->json(['ipaddresses'=>$ipaddresses]);	
		}
		
		if($request['remove_usbtoken']){
			$usbtoken = Usbtoken::where('id', $request['id'])->first();
			$usbtoken->employee_id = '';
			$usbtoken->save();
	
		}
		
		if($request['refresh_usbtoken']){
			$usbtoken = Usbtoken::where('id', $request['id'])->first();
			return response()->json(['employee_id'=>$usbtoken->employee_id]);	
		}
		
		if($request['selected_usbtoken']){
			$usbtoken = Usbtoken::where('id', $request['selected_usbtoken'])->first();
			$usbtoken->employee_id = $request['id'];
			$usbtoken->save();
		}
		
		if($request['delete_computer']){

			$now = Carbon::now();
			
			$peripherals = Peripheral::where('computer_id', $request['id'])->get();
			 foreach($peripherals as $peripheral){
				 $peripheral->computer_id = "";
				 $peripheral->history .= "Delete computer_id: " . $request['id'] . " at: " . $now . "; ";
				 $peripheral->save();
			 }
			
			
			 
			 $computer = Computer::where('id', $request['id'])->first();
			 $computer->reason_for_delete = $request['reason'];
			 
			 if($computer->accounts->count() >=1){
				 $computer->accounts_history .= " Accounts when deleting: ";
				 foreach($computer->accounts as $account){
					 $computer->accounts_history .= $account->id . ";";
				 }
				 
			 } else {
				 $computer->accounts_history .= " No accounts when deleting.";
			 }
			 
			 if($peripherals->count() >=1){
				 $computer->peripherals_history .= " Peripherals when deleting: ";
				 foreach($peripherals as $peripheral){
					 $computer->peripherals_history .= $peripheral->id . ";";
				 }
			 } else {
				 $computer->peripherals_history .= " No peripherals when deleting.";
			 }
			 
			 
			 
			 if($computer->networkprinters->count() >=1){
				 $computer->networkprinters_history .= " Network printers when deleting: ";
				 foreach($computer->networkprinters as $networkprinter){
					 $computer->networkprinters_history .= $networkprinter->id . ";";
				 }
				 
			 } else {
				 $computer->networkprinters_history .= " No network printers when deleting.";
			 }

			 $computer->save();
			 $computer->delete();
			 
			 
			 DB::table('computer_account')->where('computer_id', $request['id'])->delete();
			 DB::table('computer_networkprinter')->where('computer_id', $request['id'])->delete();

		}
		
		if($request['delete_employee']){
			
			$now = Carbon::now();
			$employee = Employee::where('id', $request['id'])->first(); 
		
			$usbtokens = Usbtoken::where('employee_id', $request['id'])->get();
			 foreach($usbtokens as $usbtoken){
				 $usbtoken->employee_id = "";
				 $usbtoken->history .= " Delete employee_id: " . $request['id'] . " at: " . $now . ";";
				 $usbtoken->save();
			 }
			 
			 if($employee->accounts->count() >=1){
				 $employee->computers_history .= " Computers when deleting: ";
				 foreach($employee->accounts as $account){
					 foreach($account->computers as $computer){
						 $employee->computers_history .= $computer->id . ";";
					 }
				 }
				 
			 } else {
				 $employee->computers_history .= " No computers when deleting.";
			 }
			 
			 if($employee->accounts->count() >=1){
				 $employee->accounts_history .= " Accounts when deleting: ";
				 foreach($employee->accounts as $account){
					 $employee->accounts_history .= $account->id . ";";
					 DB::table('computer_account')->where('account_id', $account->id)->delete();
					 $account->reason_for_delete = "Employee deleted - " . $request['reason'];
					 $account->save();
					 $account->delete();
				 }
				 
			 } else {
				 $employee->accounts_history .= " No accounts when deleting.";
			 }
			 
		
			 if($usbtokens->count() >=1){
				 $employee->usbtokens_history .= " USB tokens when deleting: ";
				 foreach($usbtokens as $usbtoken){
					$employee->usbtokens_history .= $usbtoken->id . ";";
				 }
				 
			 } else {
				 $employee->usbtokens_history .= " No USB token when deleting.";
			 }
		
			$employee->reason_for_delete = $request['reason'];
			
			$personalphones = Personalphone::where('employee_id', $request['id'])->get();
			if($personalphones->count() >=1){
				$employee->personalphones_history .= " Personal phones when deleting: ";
				foreach($personalphones as $personalphone){
					$employee->personalphones_history .= $personalphone->mark . " - " . $personalphone->model . ";";
				}
			} else {
				 $employee->personalphones_history .= " No personal phone when deleting.";
			}
			
			$authorizations = Authorization::where('employee_id', $request['id'])->get();
			if($authorizations->count() >=1){
				$employee->authorizations_history .= " Authorizations when deleting: ";
				foreach($authorizations as $authorization){
					$employee->authorizations_history .= $authorization->sn . " - " . $authorization->authorization_level . ";";
				}
			} else {
				 $employee->authorizations_history .= " No authorization when deleting.";
			}
			
			$employee->save();

			DB::table('personalphones')->where('employee_id', $request['id'])->delete();
			DB::table('authorizations')->where('employee_id', $request['id'])->delete();
			
			$employee->delete();

		}
		
		if($request['delete_networkprinter']){
			
			// $now = Carbon::now();
			$networkprinter = Networkprinter::where('id', $request['id'])->first(); 
			if($networkprinter->computers->count() >=1){
				$networkprinter->computers_history .= " Computers when deleting: ";
				foreach($networkprinter->computers as $computer){
					$networkprinter->computers_history .= $computer->id . ";";
				}
			} else {
				$networkprinter->computers_history .= "No computers when deleting.";
			}
			
			$networkprinter->reason_for_delete = $request['reason'];
			$networkprinter->save();
			
			$networkprinter->delete();
			DB::table('computer_networkprinter')->where('networkprinter_id', $request['id'])->delete();
		}
		
		if($request['delete_peripheral']){
			$peripheral = Peripheral::where('id', $request['id'])->first(); 
			$peripheral->reason_for_delete = $request['reason'];
			$peripheral->save();
			
			$peripheral->delete();
		}
		
		if($request['delete_account']){
			$account = Account::where('id', $request['id'])->first(); 
			$account->reason_for_delete = $request['reason'];
			$account->save();
			
			$account->delete();
		}
		
		if($request['delete_authorization']){
			$authorization = Authorization::where('id', $request['id'])->first(); 
			$authorization->delete();
		}
		
		if($request['delete_usbtoken']){
			$usbtoken = Usbtoken::where('id', $request['id'])->first(); 
			$usbtoken->reason_for_delete = $request['reason'];
			$usbtoken->save();
			
			$usbtoken->delete();
		}
		
		if($request['delete_personalphone']){
			$personalphone = Personalphone::where('id', $request['id'])->first(); 
			$personalphone->delete();
		}
		
		if($request['selected_account']){
			DB::table('computer_account')->insert(
				['computer_id' => $request['id'], 'account_id' => $request['selected_account']]
			);
			// return response()->json(['unu'=>$request['selected_account']]);
		}
		
		if($request['selected_networkprinter']){
			DB::table('computer_networkprinter')->insert(
				['computer_id' => $request['id'], 'networkprinter_id' => $request['selected_networkprinter']]
			);
		}
		
		if($request['selected_peripheral']){
			$peripheral = Peripheral::where('id', $request['selected_peripheral'])->first(); 
			$peripheral->computer_id = $request['id'];
			$peripheral->save();
		}
		
		if($request['remove_account']){
			DB::table('computer_account')->where('computer_id', $request['id'])->where('account_id', $request['account_id'])->delete();
		}
		
		if($request['remove_networkprinter']){
			DB::table('computer_networkprinter')->where('computer_id', $request['id'])->where('networkprinter_id', $request['networkprinter_id'])->delete();
		}
		
		if($request['remove_peripheral']){
			$peripheral = Peripheral::where('id', $request['peripheral_id'])->first(); 
			$peripheral->computer_id = '';
			$peripheral->save();
		}
		
	}
	
	

}

