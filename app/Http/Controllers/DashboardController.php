<?php

namespace assetManager\Http\Controllers;

use Illuminate\Http\Request;

use assetManager\Http\Requests;

class DashboardController extends Controller
{
    public function index()
	{
		return view('dashboard.index');
	}
}
