<?php

namespace assetManager\Http\Controllers;

use assetManager\Models\Peripheral;
use Illuminate\Http\Request;
use assetManager\Http\Requests;

class PeripheralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peripherals = Peripheral::all();
		
		return view('peripherals.index', compact('peripherals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'type');
		$mark_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'mark');
		$model_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'model');
		$destination_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'destination');
		
		return view('peripherals.create', compact('peripheral', 'type_list', 'mark_list', 'model_list', 'destination_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Peripheral::create($request->all());
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
		$peripheral = Peripheral::where('id', $id)->first();
		
		return view('peripherals.show', compact('peripheral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peripheral = Peripheral::where('id', $id)->first();
		$type_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'type');
		$mark_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'mark');
		$model_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'model');
		$destination_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Peripheral', 'destination');
		
		return view('peripherals.edit', compact('peripheral', 'type_list', 'mark_list', 'model_list', 'destination_list'));
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
		
		$peripheral = Peripheral::where('id', $id)->first();
		$peripheral->update($request->all()); 	
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
