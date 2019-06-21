<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KartuKeluargaTableSeeder::class);
        $this->call(AgamaTableSeeder::class);
        $this->call(GolonganTableSeeder::class);
        $this->call(PendidikanTableSeeder::class);
        $this->call(JenisPekerjaanTableSeeder::class);
        $this->call(StatusHubunganDalamKeluargaTableSeeder::class);
        $this->call(StatusPerkawinanTableSeeder::class);

    }
}
