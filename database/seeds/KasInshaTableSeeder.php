<?php

use Illuminate\Database\Seeder;

class KasInshaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kas_insha')->insert(array(
        	[
	        	'id_kas_insha' => '1',
	        	'jml_kas_insha' => '0'
        	]
        ));
    }
}
