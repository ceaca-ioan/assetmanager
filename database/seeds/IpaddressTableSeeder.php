<?php
use Illuminate\Database\Seeder;
use assetManager\Models\Ipaddress;


class IpaddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.101';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '1';
		$ipaddress->allocated_to = 'id1';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.102';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '2';
		$ipaddress->allocated_to = 'id2';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.103';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '1';
		$ipaddress->allocated_to = 'id3';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.104';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '2';
		$ipaddress->allocated_to = 'id4';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.105';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '1';
		$ipaddress->allocated_to = 'id5';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.105';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '1';
		$ipaddress->allocated_to = 'id5';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.100';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '1';
		$ipaddress->allocated_to = 'id6';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.101';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '2';
		$ipaddress->allocated_to = 'id7';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.102';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '1';
		$ipaddress->allocated_to = 'id8';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.103';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '2';
		$ipaddress->allocated_to = 'id9';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.104';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '1';
		$ipaddress->allocated_to = 'id10';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.105';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '1';

		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.106';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '2';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.107';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '1';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '99.100.100.108';
		$ipaddress->cis_name = 'Internet';
		$ipaddress->address_id = '2';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.200';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '1';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.201';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '2';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.202';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '1';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.203';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '2';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.204';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '1';
		$ipaddress->save();
		
		$ipaddress = new Ipaddress();
        $ipaddress->ip = '10.100.100.205';
		$ipaddress->cis_name = 'Intranet';
		$ipaddress->address_id = '2';
		$ipaddress->save();
		
		
    }
}