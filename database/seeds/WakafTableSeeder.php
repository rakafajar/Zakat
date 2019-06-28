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
                'nama_wakaf' => 'Raka Fajar Salinggih',
                'id_jeniswakaf' => '1',
                'nominal_wakaf' => '500000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_wakaf' => 'Hamba Allah',
                'id_jeniswakaf' => '2',
                'nominal_wakaf' => '300000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_wakaf' => 'Hamba Allah',
                'id_jeniswakaf' => '3',
                'nominal_wakaf' => '400000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_wakaf' => 'Hamba Allah',
                'id_jeniswakaf' => '3',
                'nominal_wakaf' => '3300000',
                'created_at' => '2019-06-28 05:47:03'
            ],
            [
                'nama_wakaf' => 'Rika Rahma',
                'id_jeniswakaf' => '5',
                'nominal_wakaf' => '3800000',
                'created_at' => '2019-06-28 05:47:03'
            ]
        ));
    }
}
