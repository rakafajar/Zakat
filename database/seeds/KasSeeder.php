<?php

use Illuminate\Database\Seeder;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kas')->insert(array(
            [
	        	'id_kas' => '1',
	        	'jml_kas' => '0'
            ],
            [
	        	'id_kas' => '2',
	        	'jml_kas' => '0'
            ],
            [
	        	'id_kas' => '3',
	        	'jml_kas' => '0'
            ],
            [
	        	'id_kas' => '4',
	        	'jml_kas' => '0'
            ],
            [
	        	'id_kas' => '5',
	        	'jml_kas' => '0'
        	]
        ));
    }
}
