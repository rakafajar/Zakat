<?php

use Illuminate\Database\Seeder;

class HargaBerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_harga')->insert(array(
        	[
        		'harga_beras' => '9600'
        	],
        	[
        		'harga_beras' => '9700'
        	],
        	[
        		'harga_beras' => '10500'
        	],
        	[
        		'harga_beras' => '10750'
        	],
        	[
        		'harga_beras' => '11650'
        	],
        	[
        		'harga_beras' => '11950'
        	]
        ));
    }
}
