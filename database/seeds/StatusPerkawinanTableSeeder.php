<?php

use Illuminate\Database\Seeder;

class StatusPerkawinanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_statusperkawinan')->insert(array(
        	[
        		'status' => 'Belum Kawin'
        	],
        	[
        		'status' => 'Kawin'
        	],
        	[
        		'status' => 'Cerai Hidup'
        	],
        	[
        		'status' => 'Cerai Mati'
        	]
        ));
    }
}
