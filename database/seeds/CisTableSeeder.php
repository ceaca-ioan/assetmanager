<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Cis;

class CisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cis = new Cis();
        $cis->name = 'Intranet';
        $cis->classification_level = 'Not Public';
		$cis->accreditation = '123';
        $cis->save();
		
		$cis = new Cis();
        $cis->name = 'Internet';
        $cis->classification_level = 'Public';
		$cis->accreditation = 'No';
        $cis->save();

    }
}
