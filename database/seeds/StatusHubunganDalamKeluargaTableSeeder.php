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
        		'hubkeluarga' => 'Kepala Keluarga'
        	],
        	[
        		'hubkeluarga' => 'Suami'
        	],
        	[
        		'hubkeluarga' => 'Istri'
        	],
        	[
        		'hubkeluarga' => 'Anak'
        	],
        	[
        		'hubkeluarga' => 'Menantu'
        	],
        	[
        		'hubkeluarga' => 'Cucu'
        	],
        	[
        		'hubkeluarga' => 'Orangtua'
        	],
        	[
        		'hubkeluarga' => 'Mertua'
        	],
        	[
        		'hubkeluarga' => 'Famili Lain'
        	],
        	[
        		'hubkeluarga' => 'Pembantu'
        	],
        	[
        		'hubkeluarga' => 'Lainnya'
        	]
        ));
    }
}
