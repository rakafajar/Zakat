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
                'no_kk' => '3240111504',
                'alamat' => 'Komplek Pasir Jati B.131',
                'rt' => '02',
                'rw' => '06',
                'kode_pos' => '40611',
                'villages_id' => '1101010001'
            ],
            [
                'no_kk' => '3240111344',
                'alamat' => 'Komplek Pasir Jambu',
                'rt' => '03',
                'rw' => '03',
                'kode_pos' => '40611',
                'villages_id' => '1101020027'
            ],
            [
                'no_kk' => '3240111504',
                'alamat' => 'Jl. Ujung Berung Bandung',
                'rt' => '03',
                'rw' => '03',
                'kode_pos' => '40611',
                'villages_id' => '1103031006'
            ],
            [
                'no_kk' => '32320111504',
                'alamat' => 'Jl. Manisi Raya',
                'rt' => '02',
                'rw' => '06',
                'kode_pos' => '40651',
                'villages_id' => '1103040004'
            ],
            [
                'no_kk' => '3240132344',
                'alamat' => 'Komplek Cibiru View 1',
                'rt' => '03',
                'rw' => '03',
                'kode_pos' => '40111',
                'villages_id' => '1103041019'
            ],
            [
                'no_kk' => '3254311504',
                'alamat' => 'Jl. Cibiru Hilir No.56',
                'rt' => '03',
                'rw' => '03',
                'kode_pos' => '40611',
                'villages_id' => '1103042003'
            ]
        ));
    }
}
