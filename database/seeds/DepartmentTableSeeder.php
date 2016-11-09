<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Department;


class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		$department = new Department();
        $department->name = 'department1';
		$department->organization_id = 1;
		$department->save();
		
		$department = new Department();
        $department->name = 'department2';
		$department->organization_id = 1;
		$department->save();
		
		$department = new Department();
        $department->name = 'department3';
		$department->organization_id = 2;
		$department->save();
		
		$department = new Department();
        $department->name = 'department4';
		$department->organization_id = 2;
		$department->save();
    }
}