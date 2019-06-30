<?php

use Illuminate\Database\Seeder;

class AnggotaKKTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_anggotakk')->insert(array(
            [
                'nama_lengkap' => 'Raka Fajar Salinggih',
                'nik' => '321509213',
                'id_kk' => '2',
                'jk' => 'Laki-Laki',
                'tmp_lahir' => 'Bandung',
                'tgl_lahir' => '1993-06-04',
                'id_agama' => '1',
                'id_pendidikan' => '8',
                'id_pekerjaan' => '4',
                'id_status_kawin' => '2',
                'id_status_hubkel' => '1',
                'kewarganegaraan' => 'WNI',
                'no_paspor' => '443131',
                'no_kitap' => '113122',
                'ayah' => 'Oom Hasanudin',
                'ibu' => 'Aan Sulistianah'
            ],
            [
                'nama_lengkap' => 'Rika S',
                'nik' => '321509212',
                'id_kk' => '1',
                'jk' => 'Perempuan',
                'tmp_lahir' => 'Bandung',
                'tgl_lahir' => '1995-06-04',
                'id_agama' => '1',
                'id_pendidikan' => '2',
                'id_pekerjaan' => '6',
                'id_status_kawin' => '1',
                'id_status_hubkel' => '3',
                'kewarganegaraan' => 'WNI',
                'no_paspor' => '443131',
                'no_kitap' => '113122',
                'ayah' => 'Oom Hasanudin',
                'ibu' => 'Aan Sulistianah'
            ],
            [
                'nama_lengkap' => 'Kevin Sanjaya',
                'nik' => '321509221',
                'id_kk' => '2',
                'jk' => 'Laki-Laki',
                'tmp_lahir' => 'Bandung',
                'tgl_lahir' => '2019-06-04',
                'id_agama' => '1',
                'id_pendidikan' => '3',
                'id_pekerjaan' => '60',
                'id_status_kawin' => '1',
                'id_status_hubkel' => '4',
                'kewarganegaraan' => 'WNI',
                'no_paspor' => '443131',
                'no_kitap' => '113122',
                'ayah' => 'Oom Hasanudin',
                'ibu' => 'Aan Sulistianah'
            ],
            [
                'nama_lengkap' => 'Fery Haryadi',
                'nik' => '313018891',
                'id_kk' => '1',
                'jk' => 'Laki-Laki',
                'tmp_lahir' => 'Bandung',
                'tgl_lahir' => '2019-06-04',
                'id_agama' => '1',
                'id_pendidikan' => '5',
                'id_pekerjaan' => '40',
                'id_status_kawin' => '1',
                'id_status_hubkel' => '4',
                'kewarganegaraan' => 'WNA',
                'no_paspor' => '443131',
                'no_kitap' => '113122',
                'ayah' => 'Oom H',
                'ibu' => 'Aan'
            ]
        ));
    }
}
