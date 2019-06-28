<?php

use Illuminate\Database\Seeder;

class InfaqShadaqahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_insha')->insert(array(
            [
                'nama_insha' => 'Raka Fajar Salinggih',
                'nominal_insha' => '500000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_insha' => 'Hamba Allah',
                'nominal_insha' => '300000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_insha' => 'Hamba Allah',
                'nominal_insha' => '400000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_insha' => 'Hamba Allah',
                'nominal_insha' => '3300000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_insha' => 'Rika Rahma',
                'nominal_insha' => '3800000',
                'created_at' => '2019-06-28 05:47:03'
            ]
        ));
    }
}
