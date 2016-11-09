<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Address;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = new Address();
        $address->name = 'address_name1';
		$address->city = 'city1';
		$address->street = 'street1';
		$address->number = '1';
		$address->county = 'county1';
		$address->postalcode = '123456';
		$address->notes = 'no notes';
        $address->save();
		
		$address = new Address();
        $address->name = 'address_name2';
		$address->city = 'city2';
		$address->street = 'street2';
		$address->number = '2';
		$address->county = 'county2';
		$address->postalcode = '123459';
		$address->notes = 'no notes';
        $address->save();
    }
}