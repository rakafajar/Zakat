<?php

use Illuminate\Database\Seeder;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_agama')->insert(array(
            [
                'nama_agama' => 'Islam'
            ],
            [
            	'nama_agama' => 'Kristen Protestan'
            ],
            [
            	'nama_agama' => 'Kristen Katolik'
            ],
            [
            	'nama_agama' => 'Hindu'
            ],
            [
            	'nama_agama' => 'Buddha'
            ],
            [
            	'nama_agama' => 'Konghucu'
            ]

        ));
    }
}
