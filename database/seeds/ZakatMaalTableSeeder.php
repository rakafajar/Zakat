<?php

use Illuminate\Database\Seeder;

class ZakatMaalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_zakat_maal')->insert(array(
            [
                'id_muzakki' => '1',
                'jml' => '19800000',
                'harga_emas' => '85000',
                'nisab' => '495000',
                'created_at' => '2019-06-28 05:47:03'
            ]
        ));
    }
}
