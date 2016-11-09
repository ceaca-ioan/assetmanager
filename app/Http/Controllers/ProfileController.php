<?php

namespace assetManager\Http\Controllers;

use Auth;
use assetManager\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller 
{
	public function getEditProfile()
	{
		return view('profile.edit');
	}
	
	public function postEditProfile(Request $request)
	{

		$this->validate($request, [
			'first_name' => 'max:30',

		]);
		
		Auth::user()->update([
			'first_name' => $request['text'],

		]);
		// return response()->json(['message' => Auth::user()->first_name]);
	}
	
	
	
}