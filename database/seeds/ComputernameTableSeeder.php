<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Computername;


class ComputernameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		$computername = new Computername();
        $computername->name = 'name1';
		$computername->section_id = '1';
		$computername->allocated_to = 'id1';
		$computername->save();
		
		$computername = new Computername();
        $computername->name = 'name2';
		$computername->section_id = '1';
		$computername->allocated_to = 'id2';
		$computername->save();
	
    }
}