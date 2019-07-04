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
        $this->call(AnggotaKKTableSeeder::class);
        $this->call(MuzakkiTableSeeder::class);
        $this->call(MustahiqTableSeeder::class);
        $this->call(HargaBerasSeeder::class);
        $this->call(JenisWakafTableSeeder::class);
        $this->call(FidyahTableSeeder::class);
        $this->call(InfaqShadaqahTableSeeder::class);
        $this->call(WakafTableSeeder::class);
        $this->call(ZakatFitrahTableSeeder::class);
        $this->call(ZakatMaalTableSeeder::class);
    }
}
