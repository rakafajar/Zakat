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
                'id_anggotakk' => '1',
                'nominal_fidyah' => '500000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'id_anggotakk' => '2',
                'nominal_fidyah' => '300000',
                'created_at' => '2019-06-28 05:47:03'
            ]
        ));
    }
}
