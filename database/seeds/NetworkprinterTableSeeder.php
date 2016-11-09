<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Networkprinter;

class NetworkprinterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$networkprinter = new Networkprinter();
        $networkprinter->id = 'np1';
		$networkprinter->ip = 'IP1';
		$networkprinter->name = 'name1';
		$networkprinter->inv_no = 'inv_no1';
		$networkprinter->organization = 'organization1';
		$networkprinter->department = 'department1';
		$networkprinter->section = 'section1';
		$networkprinter->address_name = 'address_name1';
		$networkprinter->room = '4';
		$networkprinter->cis_name = 'Intranet';
		$networkprinter->mark = 'mark1';
		$networkprinter->model = 'model1';
		$networkprinter->mac = 'mac1';
		$networkprinter->sn = 'sn1';
		$networkprinter->provenance = 'provenance1';
		$networkprinter->ai = '1';
		$networkprinter->history = 'history1';
		$networkprinter->notes = 'notes1';
        $networkprinter->save();
		
		$networkprinter = new Networkprinter();
        $networkprinter->id = 'np2';
		$networkprinter->ip = 'IP2';
		$networkprinter->name = 'name2';
		$networkprinter->inv_no = 'inv_no2';
		$networkprinter->organization = 'organization1';
		$networkprinter->department = 'department1';
		$networkprinter->section = 'section1';
		$networkprinter->address_name = 'address_name2';
		$networkprinter->room = '4';
		$networkprinter->cis_name = 'Intranet';
		$networkprinter->mark = 'mark2';
		$networkprinter->model = 'model2';
		$networkprinter->mac = 'mac2';
		$networkprinter->sn = 'sn2';
		$networkprinter->provenance = 'provenance2';
		$networkprinter->ai = '1';
		$networkprinter->history = 'history2';
		$networkprinter->notes = 'notes2';
        $networkprinter->save();
    }
}

		
			
