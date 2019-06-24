<?php

use Illuminate\Database\Seeder;

class MustahiqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_mustahiq')->insert(array(
            [
                'id_anggotakk' => '1',
                'id_golongan' => '2',
                'wilayah' => 'Internal'
            ],
            [
                'id_anggotakk' => '2',
                'id_golongan' => '1',
                'wilayah' => 'Internal'
            ],
            [
                'id_anggotakk' => '3',
                'id_golongan' => '4',
                'wilayah' => 'Eksternal'
            ]
        ));
    }
}
