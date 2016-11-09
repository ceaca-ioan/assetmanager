<?php

namespace assetManager\Http\Controllers;

use Illuminate\Http\Request;

use assetManager\Http\Requests;

class TasksController extends Controller
{
     public function index()
	{
		return view('tasks.index');
	}
}
