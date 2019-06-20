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
                'agama' => 'Islam'
            ],
            [
            	'agama' => 'Kristen Protestan'
            ],
            [
            	'agama' => 'Kristen Katolik'
            ],
            [
            	'agama' => 'Hindu'
            ],
            [
            	'agama' => 'Buddha'
            ],
            [
            	'agama' => 'Konghucu'
            ]

        ));
    }
}
