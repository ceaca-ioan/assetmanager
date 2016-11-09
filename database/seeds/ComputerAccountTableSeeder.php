<?php
use Illuminate\Database\Seeder;

class ComputerAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('computer_account')->insert([
			['computer_id' => 'id1', 'account_id' => 'john'],
			['computer_id' => 'id1', 'account_id' => 'bill'],
			['computer_id' => 'id2', 'account_id' => 'john2']
		]);
    }
}

		
			
