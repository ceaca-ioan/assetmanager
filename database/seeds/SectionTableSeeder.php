<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Section;


class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		$section = new Section();
        $section->name = 'section1';
		$section->department_id = '1';
		$section->address_id = '1';
		$section->save();
		
		$section = new Section();
        $section->name = 'section2';
		$section->department_id = '1';
		$section->address_id = '2';
		$section->save();
		
		$section = new Section();
        $section->name = 'section3';
		$section->department_id = '2';
		$section->address_id = '1';
		$section->save();
		
		$section = new Section();
        $section->name = 'section4';
		$section->department_id = '2';
		$section->address_id = '2';
		$section->save();
   
		$section = new Section();
        $section->name = 'section5';
		$section->department_id = '3';
		$section->address_id = '1';
		$section->save();
		
		$section = new Section();
        $section->name = 'section6';
		$section->department_id = '3';
		$section->address_id = '2';
		$section->save();
		
		$section = new Section();
        $section->name = 'section7';
		$section->department_id = '4';
		$section->address_id = '2';
		$section->save();
    }
}