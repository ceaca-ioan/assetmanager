<?php

namespace assetManager\Http\Controllers;

use assetManager\Models\Computer;
use assetManager\Models\Organization;
use assetManager\Models\Account;
use assetManager\Models\Employee;
use assetManager\Models\Peripheral;
use Illuminate\Http\Request;
use assetManager\Http\Requests;
use Illuminate\Support\Facades\DB;


class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::all();
		// $computers = DB::table('computers')->get();

		return view('computers.index', compact('computers'));
		// return response()->json(['computers'=>$computers]);	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$provenance_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'provenance');
		$os_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'os');
		$processor_type_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'processor_type');
		$hdd_mark_and_model_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'hdd_mark_and_model');
		$hdd_interface_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'hdd_interface');
		$optical_drive_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'optical_drive');
		$motherboard_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'motherboard');
		$ram_type_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'ram_type');
		
		return view('computers.create', compact('computer', 'provenance_list', 'os_list', 'hdd_mark_and_model_list', 'hdd_interface_list', 'optical_drive_list', 'motherboard_list', 'ram_type_list', 'processor_type_list'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Computer::create($request->all());
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
		$computer = Computer::where('id', $id)->first();
		
		return view('computers.show', compact('computer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
	
	 
	 
    public function edit($id)
    {
        $computer = Computer::where('id', $id)->first();
		$present_accounts = array();
		foreach($computer->accounts as $account){
			if($account){
				$present_accounts[$account->id] = $account->id;
			}
			
		}
		$accounts = Computer::accounts_in_department($computer->department, $present_accounts);
		
		$present_networkprinters = array();
		foreach($computer->networkprinters as $networkprinter){
			$present_networkprinters[$networkprinter->id] = $networkprinter->id;
		}
		$networkprinters = Computer::networkprinters_in_department($computer->department, $present_networkprinters);

		$peripherals = Peripheral::where('computer_id', '')->get();

		$provenance_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'provenance');
		$os_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'os');
		$processor_type_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'processor_type');
		$hdd_mark_and_model_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'hdd_mark_and_model');
		$hdd_interface_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'hdd_interface');
		$optical_drive_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'optical_drive');
		$motherboard_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'motherboard');
		$ram_type_list = \app\Http\Helperfunctions::getDistinctValues('assetManager\Models\Computer', 'ram_type');
		
		return view('computers.edit', compact('computer', 'accounts', 'networkprinters', 'peripherals', 'provenance_list', 'os_list', 'hdd_mark_and_model_list', 'hdd_interface_list', 'optical_drive_list', 'motherboard_list', 'ram_type_list', 'processor_type_list'));
		

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
		$computer = Computer::where('id', $id)->first();
		$computer->update($request->all()); 	
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
        // $computer = Computer::where('id', $id)->first();
		// $computer->delete();
		// return redirect()->route('computers')
			// ->with('info', 'Successfully deleted!'
			// );
    }
}
