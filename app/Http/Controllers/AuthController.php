<?php

namespace assetManager\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use assetManager\Models\User;

class AuthController extends Controller 
{
	public function getSignup()
	{
		return view('auth.signup');
	}
	
	public function postSignup(Request $request)
	{
		$this->validate($request, [
			'first_name' => 'required|max:30',
			'last_name' => 'required|max:30',
			'email' => 'required|email|max:80',
			'pnc' => 'required|unique:users|max:20',
			'username' => 'required|unique:users|max:30',
			'password' => 'required|min:6|max:30|confirmed',
		]);
		
		User::create([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'email' => $request->input('email'),
			'pnc' => $request->input('pnc'),
			'username' => $request->input('username'),
			'password' => bcrypt($request->input('password')),
		]);
		
		return redirect()
			->route('home')
			->with('info', 'Your request has been send and you will be notified on email with the details'
			);
	}
	
	public function getSignin()
	{
		return view('auth.signin');
	}
	
	public function postSignin(Request $request)
	{
		$this->validate($request, [
			'username' => 'required|max:30',
			'password' => 'required|max:30',
		]);
		
		$username = $request->input('username');
		$password = $request->input('password');
		
		if (!Auth::attempt(['username' => $username, 'password' => $password, 'status' => 1]))

		{
			return redirect()->back()->with('info', 'Could not sign you in with those credentials');
		}
		
		return redirect()->route('home')->with('info', 'You are now signed in');
	}
	
	public function getSignout()
	{
		Auth::logout();
		
		return redirect()->route('home');
	}
	
}