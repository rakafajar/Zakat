<?php

use Illuminate\Database\Seeder;

class StatusHubunganDalamKeluargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_hubkeluarga')->insert(array(
        	[
        		'nama_hubkeluarga' => 'Kepala Keluarga'
        	],
        	[
        		'nama_hubkeluarga' => 'Suami'
        	],
        	[
        		'nama_hubkeluarga' => 'Istri'
        	],
        	[
        		'nama_hubkeluarga' => 'Anak'
        	],
        	[
        		'nama_hubkeluarga' => 'Menantu'
        	],
        	[
        		'nama_hubkeluarga' => 'Cucu'
        	],
        	[
        		'nama_hubkeluarga' => 'Orangtua'
        	],
        	[
        		'nama_hubkeluarga' => 'Mertua'
        	],
        	[
        		'nama_hubkeluarga' => 'Famili Lain'
        	],
        	[
        		'nama_hubkeluarga' => 'Pembantu'
        	],
        	[
        		'nama_hubkeluarga' => 'Lainnya'
        	]
        ));
    }
}
