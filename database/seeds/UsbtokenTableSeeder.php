<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Usbtoken;

class UsbtokenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$usbtoken = new Usbtoken();
		$usbtoken->id = 'tok1';
        $usbtoken->employee_id = '123';
		$usbtoken->mark_model = 'mark1';
		$usbtoken->classification_level = 'classification_level1';
		$usbtoken->registration_no = 'registration_no1';
		$usbtoken->registration_date = '2016-08-09'; 
		$usbtoken->history = 'history1';
		$usbtoken->notes = 'notes1';
        $usbtoken->save(); 
		
		$usbtoken = new Usbtoken();
		$usbtoken->id = 'tok2';
        $usbtoken->employee_id = '123';
		$usbtoken->mark_model = 'mark2';
		$usbtoken->classification_level = 'classification_level2';
		$usbtoken->registration_no = 'registration_no2';
		$usbtoken->registration_date = '2016-08-09'; 
		$usbtoken->history = 'history2';
		$usbtoken->notes = 'notes2';
        $usbtoken->save();
    }
}