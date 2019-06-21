<?php

use Illuminate\Database\Seeder;

class GolonganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_golongan')->insert(array(
        	[
        		'nama_golongan' => 'Fakir'
        	],
        	[
        		'nama_golongan' => 'Miskin'
        	],
        	[
        		'nama_golongan' => 'Riqab'
        	],
        	[
        		'nama_golongan' => 'Gharim'
        	],
        	[
        		'nama_golongan' => 'Mualaf'
        	],
        	[
        		'nama_golongan' => 'Fisabilliah'
        	],
        	[
        		'nama_golongan' => 'Ibnu Sabil'
        	],
        	[
        		'nama_golongan' => 'Amil Zakat'
        	]
        ));
    }
}
