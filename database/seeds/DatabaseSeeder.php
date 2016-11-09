<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class); 
		$this->call(UserTableSeeder::class); 
		$this->call(ComputerTableSeeder::class);
		$this->call(AccountTableSeeder::class);
		$this->call(PeripheralTableSeeder::class);
		$this->call(NetworkprinterTableSeeder::class);
		$this->call(EmployeeTableSeeder::class);
		$this->call(UsbtokenTableSeeder::class);
		$this->call(PersonalphoneTableSeeder::class);
		$this->call(AuthorizationTableSeeder::class);
		$this->call(ComputerAccountTableSeeder::class);
		$this->call(ComputerNetworkprinterTableSeeder::class);
		$this->call(CisTableSeeder::class);
		$this->call(AddressTableSeeder::class);
		$this->call(OrganizationTableSeeder::class); 
		$this->call(DepartmentTableSeeder::class); 
		$this->call(SectionTableSeeder::class); 
		$this->call(IpaddressTableSeeder::class); 
		$this->call(ComputernameTableSeeder::class);
    }
}
