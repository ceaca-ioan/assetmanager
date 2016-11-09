<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Peripheral;

class PeripheralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$peripheral = new Peripheral();
        $peripheral->id = 'per1';
		$peripheral->type = 'type1';
		$peripheral->mark = 'mark1';
		$peripheral->model = 'model1';
		$peripheral->sn = 'sn1';
		$peripheral->destination = 'destination1';
		$peripheral->computer_id = 'id1';
        $peripheral->save();
		
		$peripheral = new Peripheral();
        $peripheral->id = 'per2';
		$peripheral->type = 'type2';
		$peripheral->mark = 'mark2';
		$peripheral->model = 'model2';
		$peripheral->sn = 'sn2';
		$peripheral->destination = 'destination2';
		$peripheral->computer_id = 'id1';
        $peripheral->save();
    }
}

		
			
