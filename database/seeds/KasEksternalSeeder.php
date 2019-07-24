<?php

use Illuminate\Database\Seeder;

class KasEksternalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kas_eksternal')->insert(array(
            [
	        	'id_kas_eks' => '1',
	        	'jml_kas_eks' => '0'
            ],
            [
	        	'id_kas_eks' => '2',
	        	'jml_kas_eks' => '0'
            ]
        ));
    }
}
