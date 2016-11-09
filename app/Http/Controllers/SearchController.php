<?php

namespace assetManager\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use assetManager\Models\Computer;
use assetManager\Models\Peripheral; 
use assetManager\Models\Networkprinter; 
use assetManager\Models\Employee;
use assetManager\Models\Account;
use assetManager\Models\Usbtoken;

class SearchController extends Controller 
{
	public function getResults(Request $request)
	{
		$query = $request->input('query');
		
		if(!$query){
			return redirect()->route('home');
		}

		if(Input::get('computers')) {
			$computers = Computer::where('id', 'LIKE', "%{$query}%")
				->orWhere('ip', 'LIKE', "%{$query}%")
				->orWhere('name', 'LIKE', "%{$query}%")
				->get();
			
			return view('computers.index', compact('computers'));
		 }
		 
		if(Input::get('peripherals')) {
			$peripherals = Peripheral::where('id', 'LIKE', "%{$query}%")
				->orWhere('type', 'LIKE', "%{$query}%")
				->orWhere('mark', 'LIKE', "%{$query}%")
				->orWhere('model', 'LIKE', "%{$query}%")
				->orWhere('sn', 'LIKE', "%{$query}%")
				->get();
			 return view('peripherals.index', compact('peripherals')); 
		 }
		 
		if(Input::get('networkprinters')) {
			$networkprinters = Networkprinter::where('id', 'LIKE', "%{$query}%")
				->orWhere('ip', 'LIKE', "%{$query}%")
				->orWhere('mark', 'LIKE', "%{$query}%")
				->orWhere('model', 'LIKE', "%{$query}%")
				->orWhere('sn', 'LIKE', "%{$query}%")
				->orWhere('mac', 'LIKE', "%{$query}%")
				->get();
			 
			return view('networkprinters.index', compact('networkprinters')); 
		 }
		 
		if(Input::get('employees')) {
			$employees = Employee::where('id', 'LIKE', "%{$query}%")
				->orWhere('first_name', 'LIKE', "%{$query}%")
				->orWhere('last_name', 'LIKE', "%{$query}%")
				->orWhere('first_name', 'LIKE', "%{$query}%")
				->get();
			 
			 return view('employees.index', compact('employees')); 
		 }
		 
		if(Input::get('accounts')) {
			$accounts = Account::where('id', 'LIKE', "%{$query}%")
				->orWhere('employee_id', 'LIKE', "%{$query}%")
				->get();
			 
			 return view('accounts.index', compact('accounts')); 
			  
		 }  		if(Input::get('usbtokens')) {
			$usbtokens = Usbtoken::where('id', 'LIKE', "%{$query}%")
				->orWhere('employee_id', 'LIKE', "%{$query}%")
				->get();

			 return view('usbtokens.index', compact('usbtokens'));
		 }
	}
	
}