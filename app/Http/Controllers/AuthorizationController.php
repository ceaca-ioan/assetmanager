<?php

namespace assetManager\Http\Controllers;

use Illuminate\Http\Request;
use assetManager\Models\Authorization;
use assetManager\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;


class AuthorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorizations = Authorization::all();
		
		return view('authorizations.index', compact('authorizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $employee_id = Input::get('employee_id');
	   $authorization_levels = Authorization::authorization_levels();
	   
       return view('authorizations.create', compact('employee_id', 'authorization_levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Authorization::create($request->all());
		return redirect()->route('employees.edit', ['id' => $request['employee_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorization = Authorization::where('id', $id)->first();
		
		return view('authorizations.show', compact('authorization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
	    $authorization = Authorization::where('id', $id)->first();
		$authorization_levels = Authorization::authorization_levels()->except($authorization->authorization_level);
		
		return view('authorizations.edit', compact('authorization', 'authorization_levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'sn' => 'max:20',

		]);
		$authorization = Authorization::where('id', $id)->first();
		$authorization->update($request->all()); 	
		return redirect()
			->back()
			->with('info', 'Successfully updated!'
			);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
