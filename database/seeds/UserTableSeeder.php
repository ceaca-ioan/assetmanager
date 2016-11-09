<?php
use Illuminate\Database\Seeder;
use assetManager\Models\User;
use assetManager\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$role_admin = Role::where('name', 'Admin')->first();
		$role_edit = Role::where('name', 'Editor')->first();
        $role_view = Role::where('name', 'Viewer')->first();
		$role_user = Role::where('name', 'User')->first();
		
		$admin = new User();
        $admin->first_name = 'Admin';
        $admin->last_name = 'Full';
        $admin->email = 'admin@example.com';
		$admin->pnc = '111';
		$admin->username = 'admin';
        $admin->password = bcrypt('123456');
		$admin->status = '1';
        $admin->save();
        $admin->roles()->attach($role_admin);
		
		$user_edit = new User();
        $user_edit->first_name = 'Admin';
        $user_edit->last_name = 'Sec';
        $user_edit->email = 'admin_sec@example.com';
		$user_edit->pnc = '112';
		$user_edit->username = 'admin_sec';
        $user_edit->password = bcrypt('123456');
		$user_edit->status = '1';
        $user_edit->save();
        $user_edit->roles()->attach($role_edit);
		
        $user_view = new User();
        $user_view->first_name = 'Admin';
        $user_view->last_name = 'Sys';
        $user_view->email = 'admin_sys@example.com';
		$user_view->pnc = '113';
		$user_view->username = 'admin_sys';
        $user_view->password = bcrypt('123456');
		$user_view->status = '1';
        $user_view->save();
        $user_view->roles()->attach($role_view);
   
		$user = new User();
        $user->first_name = 'Simple';
        $user->last_name = 'User';
        $user->email = 'user@example.com';
		$user->pnc = '114';
		$user->username = 'user';
        $user->password = bcrypt('123456');
		$user->status = '1';
        $user->save();
        $user->roles()->attach($role_user);
        
    }
}