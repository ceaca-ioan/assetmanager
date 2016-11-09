<?php

namespace assetManager\Http\Controllers;

use Illuminate\Http\Request;
use assetManager\Http\Requests;
use assetManager\Models\Networkprinter;


class AjaxController extends Controller
{
	
	
    public function keyup(Request $request)
	{	
		// if($request['organizations']){
			// $organizations = Organization::getOrganizationNames();
			// return response()->json(['organizations'=>$organizations]);	
		// }
		
		// return response()->json(['organizations'=>'organizations']);
	}
	
	

}

