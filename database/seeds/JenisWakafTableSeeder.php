<?php

use Illuminate\Database\Seeder;

class JenisWakafTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_jeniswakaf')->insert(array(
            [
                'jenis_wakaf' => 'Tanah'
            ],
            [
                'jenis_wakaf' => 'Bangunan'
            ],
            [
                'jenis_wakaf' => 'Tanaman'
            ],
            [
                'jenis_wakaf' => 'Rumah Susun'
            ],
            [
                'jenis_wakaf' => 'Uang'
            ],
            [
                'jenis_wakaf' => 'Logam Mulia'
            ],
            [
                'jenis_wakaf' => 'Surat Berharga'
            ],
            [
                'jenis_wakaf' => 'Kendaraan'
            ],
            [
                'jenis_wakaf' => 'Hak Atas Kekayaan Intelektual'
            ],
            [
                'jenis_wakaf' => 'Hak Sewa'
            ],
            [
                'jenis_wakaf' => 'Benda Tidak Bergerak Lainnya'
            ],
            [
                'jenis_wakaf' => 'Benda Bergerak Lainnya'
            ]
        ));
    }
}
