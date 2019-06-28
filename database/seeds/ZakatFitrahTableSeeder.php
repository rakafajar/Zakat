<?php

use Illuminate\Database\Seeder;

class ZakatFitrahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_zakat_fitrah')->insert(array(
            [
                'id_muzakki' => '1',
                'harga_beras' => '9600',
                'nominal' => '500000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'id_muzakki' => '2',
                'harga_beras' => '10500',
                'nominal' => '300000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'id_muzakki' => '3',
                'harga_beras' => '10500',
                'nominal' => '400000',
                'created_at' => '2019-06-28 05:47:03'
            ]
        ));
    }
}
