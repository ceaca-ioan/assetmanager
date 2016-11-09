<?php

namespace assetManager\Http\Controllers;

use Illuminate\Http\Request;

use assetManager\Http\Requests;
use assetManager\Models\Personalphone;
use Illuminate\Support\Facades\Input;

class PersonalphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalphones = Personalphone::all();
				
		return view('personalphones.index', compact('personalphones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $employee_id = Input::get('employee_id');
       return view('personalphones.create', compact('employee_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Personalphone::create($request->all());
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personalphone = Personalphone::where('id', $id)->first();
		
		return view('personalphones.show', compact('personalphone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $personalphone = Personalphone::where('id', $id)->first();
		
		return view('personalphones.edit', compact('personalphone'));
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
			'mark' => 'max:100',

		]);
		$personalphone = Personalphone::where('id', $id)->first();
		$personalphone->update($request->all()); 	
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
