<?php
use Illuminate\Database\Seeder;

class ComputerNetworkprinterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('computer_networkprinter')->insert([
			['computer_id' => 'id1', 'networkprinter_id' => 'np1'],
			['computer_id' => 'id1', 'networkprinter_id' => 'np2'],
			['computer_id' => 'id2', 'networkprinter_id' => 'np1']
		]);
    }
}

		
			
