<?php

use Illuminate\Database\Seeder;

class MuzakkiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_muzakki')->insert(array(
            [
                'id_anggotakk' => '1'
            ],
            [
                'id_anggotakk' => '2'
            ],
            [
                'id_anggotakk' => '4'
            ],
        ));
    }
}
