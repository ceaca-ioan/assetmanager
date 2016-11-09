<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Account;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$account = new Account();
        $account->id = 'john';
		$account->employee_id = '123';
		$account->type = 'Admin';
		$account->cis_name = 'Intranet';
		$account->approval_number = '112';
		$account->approval_date = '2016-08-09';
		$account->status = '1';
		$account->notes = 'no notes';
        $account->save();
		
		$account = new Account();
        $account->id = 'john2';
		$account->employee_id = '123';
		$account->type = 'User';
		$account->cis_name = 'Intranet';
		$account->approval_number = '111';
		$account->approval_date = '2016-08-09';
		$account->status = '1';
		$account->notes = 'no notes2';
        $account->save();
		
		$account = new Account();
        $account->id = 'bill';
		$account->employee_id = '124';
		$account->type = 'Admin';
		$account->cis_name = 'Intranet';
		$account->approval_number = '114';
		$account->approval_date = '2016-08-09';
		$account->status = '1';
		$account->notes = 'no notes2';
        $account->save();

    }
}