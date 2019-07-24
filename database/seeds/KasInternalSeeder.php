<?php

use Illuminate\Database\Seeder;

class KasInternalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kas_internal')->insert(array(
            [
	        	'id_kas_int' => '1',
	        	'jml_kas_int' => '0'
            ],
            [
	        	'id_kas_int' => '2',
	        	'jml_kas_int' => '0'
            ]
        ));
    }
}
