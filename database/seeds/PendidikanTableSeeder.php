<?php

use Illuminate\Database\Seeder;

class PendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_pendidikan')->insert(array(
        	[
        		'nama_pendidikan' => 'Tidak/Belum Sekolah'
        	],
        	[
        		'nama_pendidikan' => 'Belum Tamat SD/Sederajat'
        	],
        	[
        		'nama_pendidikan' => 'Tamat SD/Sederajat'
        	],
        	[
        		'nama_pendidikan' => 'SLTP/Sederajat'
        	],
        	[
        		'nama_pendidikan' => 'SLTA/Sederajat'
        	],
        	[
        		'nama_pendidikan' => 'Diploma I/II'
        	],
        	[
        		'nama_pendidikan' => 'Akademi/Diploma III/Sarjana Muda'
        	],
        	[
        		'nama_pendidikan' => 'Diploma IV/Strata I'
        	],
        	[
        		'nama_pendidikan' => 'Strata II'
        	],
            [
                'nama_pendidikan' => 'Strata III'
            ]
        ));
    }
}
