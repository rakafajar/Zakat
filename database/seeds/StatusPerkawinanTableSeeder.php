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
        		'nama_status' => 'Belum Kawin'
        	],
        	[
        		'nama_status' => 'Kawin'
        	],
        	[
        		'nama_status' => 'Cerai Hidup'
        	],
        	[
        		'nama_status' => 'Cerai Mati'
        	]
        ));
    }
}
