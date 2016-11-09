<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Personalphone;

class PersonalphoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$personalphone = new Personalphone();
		$personalphone->employee_id = '123';
        $personalphone->mark = 'mark1';
		$personalphone->model = 'model1';
		$personalphone->notes = 'notes1';
        $personalphone->save(); 

		$personalphone = new Personalphone();
		$personalphone->employee_id = '124';
        $personalphone->mark = 'mark2';
		$personalphone->model = 'model2';
		$personalphone->notes = 'notes2';
        $personalphone->save(); 
    }
}