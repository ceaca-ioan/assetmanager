<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Authorization;

class AuthorizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$authorization = new Authorization();
        $authorization->sn = 'serialnumber';
		$authorization->employee_id = '123';
		$authorization->authorization_level = 'authorization_level';
		$authorization->issue_date = '2016-08-08';
		$authorization->expiry_date = '2016-08-08';
        $authorization->save(); 
    }
}