<?php

use Illuminate\Database\Seeder;

class KartuKeluargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kartukeluarga')->insert(array(
            [
                'no_kk' => '1147050132',
                'alamat' => 'Komplek Pasir Jati B.131',
                'rt' => '02',
                'rw' => '06',
                'kode_pos' => '40611',
                'villages_id' => '1101010005'
            ],
            [
                'no_kk' => '1147050135',
                'alamat' => 'Komplek Pasir Jambu',
                'rt' => '03',
                'rw' => '03',
                'kode_pos' => '40611',
                'villages_id' => '1101010006'
            ],
            [
                'no_kk' => '1147050136',
                'alamat' => 'Komplek Aja',
                'rt' => '03',
                'rw' => '03',
                'kode_pos' => '40611',
                'villages_id' => '1103060016'
            ]
        ));
    }
}
