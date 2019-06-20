<?php

use Illuminate\Database\Seeder;

class JenisPekerejaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_jenispekerjaan')->insert(array(
        	[
        		'pekerjaan' => 'Belum/Tidak Bekerja'
        	],
        	[
        		'pekerjaan' => 'Mengurus Rumah Tangga'
        	],
        	[
        		'pekerjaan' => 'Pelajar/Mahasiswa'
        	],
        	[
        		'pekerjaan' => 'Pensiunan'
        	],
        	[
        		'pekerjaan' => 'Pegawai Negeri Sipil'
        	],
        	[
        		'pekerjaan' => 'TNI'
        	],
        	[
        		'pekerjaan' => 'Kepolisian RI'
        	],
        	[
        		'pekerjaan' => 'Perdagangan'
        	],
        	[
        		'pekerjaan' => 'Petani/Pekebun'
        	],
        	[
        		'pekerjaan' => 'Peternak'
        	],
        	[
        		'pekerjaan' => 'Nelayan/Perikanan'
        	],
        	[
        		'pekerjaan' => 'Industri'
        	],
        	[
        		'pekerjaan' => 'Konstruksi'
        	],
        	[
        		'pekerjaan' => 'Transportasi'
        	],
        	[
        		'pekerjaan' => 'Karyawan Swasta'
        	],
        	[
        		'pekerjaan' => 'Karyawan BUMN'
        	],
        	[
        		'pekerjaan' => 'Karyawan BUMD'
        	],
        	[
        		'pekerjaan' => 'Pembantu Rumah Tangga'
        	],
        	[
        		'pekerjaan' => 'Seniman'
        	],
        	[
        		'pekerjaan' => 'Wartawan'
        	],
        	[
        		'pekerjaan' => 'Anggota DPR-RI'
        	],
        	[
        		'pekerjaan' => 'Anggota DPD'
        	],
        	[
        		'pekerjaan' => 'Dosen'
        	],
        	[
        		'pekerjaan' => 'Guru'
        	],
        	[
        		'pekerjaan' => 'Pilot'
        	],
        	[
        		'pekerjaan' => 'Pengacara'
        	],
        	[
        		'pekerjaan' => 'Dokter'
        	],
        	[
        		'pekerjaan' => 'Arsitek'
        	],
        	[
        		'pekerjaan' => 'Wiraswasta'
        	]
        ));
    }
}
