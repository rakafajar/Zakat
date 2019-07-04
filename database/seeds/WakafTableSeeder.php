<?php

use Illuminate\Database\Seeder;

class WakafTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_wakaf')->insert(array(
            [
                'id_anggotakk' => '1',
                'id_jeniswakaf' => '1',
                'nominal_wakaf' => '500000',
                'created_at' => '2019-06-28 05:47:03'
            ]
        ));
    }
}
