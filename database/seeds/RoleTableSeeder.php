<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Full permissions';
        $role_admin->save();
		
		$role_edit = new Role();
        $role_edit->name = 'Editor';
        $role_edit->description = 'Permission to edit Asset Manager';
        $role_edit->save();
		
		$role_view = new Role();
        $role_view->name = 'Viewer';
        $role_view->description = 'Permission to view Asset Manager';
        $role_view->save();
		
		$role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'Permission to visit certain pages';
        $role_user->save();
        
        
    }
}