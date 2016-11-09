<?php

namespace assetManager\Http\Controllers;

use assetManager\Models\Employee;
use assetManager\Models\Usbtoken;
use Illuminate\Http\Request;
use assetManager\Http\Requests;
use Illuminate\Support\Collection;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
				
		return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$ranks = Employee::ranks();
		$positions = Employee::positions();
		
		return view('employees.create', compact('ranks','positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::create($request->all());
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$employee = Employee::where('id', $id)->first();
		
		return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
		$employee = Employee::where('id', $id)->first();
		$ranks = Employee::ranks()->except($employee->rank);
		$positions = Employee::positions()->except($employee->position);

		$usb_tokens = Usbtoken::where('employee_id', '')->get();
		
		return view('employees.edit', compact('employee', 'ranks','positions', 'usb_tokens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'type' => 'max:20',

		]);
		$employee = Employee::where('id', $id)->first();
		$employee->update($request->all()); 	
		return redirect()
			->back()
			->with('info', 'Successfully updated!'
			);
    }
	


    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
