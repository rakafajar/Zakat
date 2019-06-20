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
        		'pendidikan' => 'Tidak/Belum Sekolah'
        	],
        	[
        		'pendidikan' => 'Belum Tamat SD/Sederajat'
        	],
        	[
        		'pendidikan' => 'Tamat SD/Sederajat'
        	],
        	[
        		'pendidikan' => 'SLTP/Sederajat'
        	],
        	[
        		'pendidikan' => 'SLTA/Sederajat'
        	],
        	[
        		'pendidikan' => 'Diploma I/II'
        	],
        	[
        		'pendidikan' => 'Akademi/Diploma III/Sarjana Muda'
        	],
        	[
        		'pendidikan' => 'Diploma IV/Strata I'
        	],
        	[
        		'pendidikan' => 'Strata II'
        	],
            [
                'pendidikan' => 'Strata III'
            ]
        ));
    }
}
