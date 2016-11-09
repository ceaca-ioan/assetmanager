<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$employee = new Employee();
        $employee->id = '123';
		$employee->first_name = 'first_name1';
		$employee->last_name = 'last_name1';
		$employee->father_last_name = 'father_last_name1';
		$employee->rank = 'rank1';
		$employee->position = 'position1';
		$employee->organization = 'organization1';
		$employee->department = 'department1';
		$employee->section = 'section1';
		$employee->work_phone_no = 'work_phone1';
		$employee->personal_phone_no = 'personal_no1';
		$employee->notes = 'notes1';
        $employee->save();
		
		$employee = new Employee();
        $employee->id = '124';
		$employee->first_name = 'first_name2';
		$employee->last_name = 'last_name2';
		$employee->father_last_name = 'father_last_name2';
		$employee->rank = 'rank2';
		$employee->position = 'position2';
		$employee->organization = 'organization1';
		$employee->department = 'department1';
		$employee->section = 'section1';
		$employee->work_phone_no = 'work_phone2';
		$employee->personal_phone_no = 'personal_no2';
		$employee->notes = 'notes2';
        $employee->save();
    }
}