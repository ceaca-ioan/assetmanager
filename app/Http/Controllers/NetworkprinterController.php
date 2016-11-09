<?php

namespace assetManager\Http\Controllers;

use assetManager\Models\Networkprinter;
use assetManager\Models\Organization;
use Illuminate\Http\Request;
use assetManager\Http\Requests;

class NetworkprinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $networkprinters = Networkprinter::all();
		
		return view('networkprinters.index', compact('networkprinters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
		$mark_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Networkprinter', 'mark');
		$model_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Networkprinter', 'model');
		$provenance_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Networkprinter', 'provenance');
		
		return view('networkprinters.create', compact('networkprinter', 'mark_list', 'model_list', 'provenance_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Networkprinter::create($request->all());
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
		$networkprinter = Networkprinter::where('id', $id)->first();
		
		return view('networkprinters.show', compact('networkprinter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $networkprinter = Networkprinter::where('id', $id)->first();
		$mark_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Networkprinter', 'mark');
		$model_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Networkprinter', 'model');
		$provenance_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Networkprinter', 'provenance');
		
		return view('networkprinters.edit', compact('networkprinter', 'mark_list', 'model_list', 'provenance_list'));
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
			'ip' => 'max:20',
		]);
		
		$networkprinter = Networkprinter::where('id', $id)->first();
		$networkprinter->update($request->all()); 	
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
