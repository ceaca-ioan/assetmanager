<?php

namespace assetManager\Http\Controllers;

use Illuminate\Http\Request;
use assetManager\Http\Requests;
use assetManager\Models\Usbtoken;

class UsbtokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usbtokens = Usbtoken::all();
		
		return view('usbtokens.index', compact('usbtokens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usbtokens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Usbtoken::create($request->all());
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
		$usbtoken = Usbtoken::where('id', $id)->first();
		
		return view('usbtokens.show', compact('usbtoken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usbtoken = Usbtoken::where('id', $id)->first();
		
		return view('usbtokens.edit', compact('usbtoken'));
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
			'mark_model' => 'max:100',

		]);
		$usbtoken = Usbtoken::where('id', $id)->first();
		$usbtoken->update($request->all()); 	
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
