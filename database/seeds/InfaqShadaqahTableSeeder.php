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
                'nominal_insha' => '500000'
            ],
            [
                'nama_insha' => 'Hamba Allah',
                'nominal_insha' => '300000'
            ],
            [
                'nama_insha' => 'Hamba Allah',
                'nominal_insha' => '400000'
            ],
            [
                'nama_insha' => 'Hamba Allah',
                'nominal_insha' => '3300000'
            ],
            [
                'nama_insha' => 'Rika Rahma',
                'nominal_insha' => '3800000'
            ]
        ));
    }
}
