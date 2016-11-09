<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Organization;


class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		$organization = new Organization();
        $organization->name = 'organization1';
		$organization->save();
		
		$organization = new Organization();
        $organization->name = 'organization2';
		$organization->save();
    }
}