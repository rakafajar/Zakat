<?php

use Illuminate\Database\Seeder;

class FidyahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_fidyah')->insert(array(
            [
                'nama_fidyah' => 'Raka Fajar Salinggih',
                'nominal_fidyah' => '500000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_fidyah' => 'Hamba Allah',
                'nominal_fidyah' => '300000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_fidyah' => 'Hamba Allah',
                'nominal_fidyah' => '400000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_fidyah' => 'Hamba Allah',
                'nominal_fidyah' => '3300000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_fidyah' => 'Rika Rahma',
                'nominal_fidyah' => '3800000',
                'created_at' => '2019-06-28 05:47:03'
            ]
        ));
    }
}
