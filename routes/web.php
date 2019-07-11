<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


// Untuk Halaman Awal Tampil
Route::resource('dashboard', 'DashboardController');


// Untuk Controller dan View KartuKeluarga
Route::resource('kartukeluarga', 'KartuKeluargaController');
Route::post('kartukeluarga/fetch', 'KartuKeluargaController@fetch')->name('kartukeluarga.fetch');
Route::get('kartukeluarga/destroy/{id}', 'KartuKeluargaController@destroy');

// Untuk Controller dan View AnggotaKeluarga
Route::resource('anggotakeluarga', 'AnggotaKeluargaController');
Route::get('anggotakeluarga/destroy/{id}', 'AnggotaKeluargaController@destroy');
Route::get('anggotakeluarga/show/{id}', 'AnggotaKeluargaController@show');
Route::post('anggotakeluarga/hapus', 'AnggotaKeluargaController@deleteSelected');

// Untuk Controller Golongan dan View Golongan
Route::resource('user', 'UserController');
Route::get('user/destroy/{id}', 'UserController@destroy');

// Untuk Controller Golongan dan View Golongan
Route::resource('golongan', 'GolonganController');
Route::get('golongan/destroy/{id}', 'GolonganController@destroy');

// Untuk Controller dan View Zakat Fitrah
Route::resource('zakatfitrah', 'ZakatFitrahController');
Route::get('zakatfitrah/destroy/{id}', 'ZakatFitrahController@destroy');
Route::get('laporanzakatfitrah', 'ZakatFitrahController@laporanzakatFitrah');
Route::get('zakatfitrah/invoice/{id}', 'ZakatFitrahController@buktiBayar');
Route::post('zakatfitrah/hapus', 'ZakatFitrahController@deleteSelected');


// Untuk Controller dan View Zakat MAal
Route::resource('zakatmaal', 'ZakatMaalController');
Route::get('zakatmaal/destroy/{id}', 'ZakatMaalController@destroy');
Route::get('laporanzakatmaal', 'ZakatMaalController@laporanzakatMaal');
Route::get('zakatmaal/invoice/{id}', 'ZakatMaalController@buktiBayar');
Route::post('zakatmaal/hapus', 'ZakatMaalController@deleteSelected');

// Untuk Controller dan View Waqaf
Route::resource('wakaf', 'WakafController');
Route::get('wakaf/destroy/{id}', 'WakafController@destroy');
Route::get('laporanwakaf', 'WakafController@laporanWakaf');
Route::get('wakaf/invoice/{id}', 'WakafController@buktiBayar');
Route::post('wakaf/hapus', 'WakafController@deleteSelected');

// Untuk Controller dan View Jenis Wakaf
Route::resource('jeniswakaf', 'JenisWakafController');
Route::get('jeniswakaf/destroy/{id}', 'JenisWakafController@destroy');

// Untuk Controller dan View Infaq & Shodaqoh
Route::resource('infaqshadaqah', 'InfaqShadaqahController');
Route::get('infaqshadaqah/destroy/{id}', 'InfaqShadaqahController@destroy');
Route::get('laporaninsa', 'InfaqShadaqahController@laporanInsa');
Route::get('infaqshadaqah/invoice/{id}', 'InfaqShadaqahController@buktiBayar');
Route::post('infaqshadaqah/hapus', 'InfaqShadaqahController@deleteSelected');

//Untuk Controller dan View Pengeluaran Infaq & Shodaqoh
Route::resource('pengeluaraninsha', 'PengeluaranInshaController');
Route::get('pengeluaraninsha/destroy/{id}', 'PengeluaranInshaController@destroy');
Route::get('pengeluaraninsha/invoiceinsha/{id}', 'PengeluaranInshaController@buktiBayar');

//Untuk Controller dan View Pengeluaran Wakaf
Route::resource('pengeluaranwakaf', 'PengeluaranWakafController');
Route::get('pengeluaranwakaf/destroy/{id}', 'PengeluaranWakafController@destroy');
Route::get('pengeluaranwakaf/invoicewakaf/{id}', 'PengeluaranWakafController@buktiBayar');

//Untuk Controller dan View Pengeluaran Fidyah
Route::resource('pengeluaranfidyah', 'PengeluaranFidyahController');
Route::get('pengeluaranfidyah/destroy/{id}', 'PengeluaranFidyahController@destroy');
Route::get('pengeluaranfidyah/invoicefidyah/{id}', 'PengeluaranFidyahController@buktiBayar');


//Untuk Controller dan View Pengeluaran Zakat Maal
Route::resource('pengeluaranzakatmaal', 'PengeluaranZakatMaalController');
Route::get('pengeluaranzakatmaal/destroy/{id}', 'PengeluaranZakatMaalController@destroy');
Route::get('pengeluaranzakatmaal/invoicezakatmaal/{id}', 'PengeluaranZakatMaalController@buktiBayar');


// Untuk Controller dan View Fidyah
Route::resource('fidyah', 'FidyahController');
Route::get('fidyah/destroy/{id}', 'FidyahController@destroy');
Route::get('laporanfidyah', 'FidyahController@laporanFidyah');
Route::get('fidyah/invoice/{id}', 'FidyahController@buktiBayar');
Route::post('fidyah/hapus', 'FidyahController@deleteSelected');

// Untuk Controller dan View Provinsi
Route::resource('provinsi', 'ProvinsiController');

// Untuk Controller dan View Kota/Kabupaten
Route::resource('kotakabupaten', 'KotaKabupatenController');

// Untuk Controller dan View Kecamatan
Route::resource('kecamatan', 'KecamatanController');

// Untuk Controller dan View Kelurahan
Route::resource('kelurahan', 'KelurahanController');

// Untuk Controller dan View Agama
Route::resource('agama', 'AgamaController');
Route::get('agama/destroy/{id}', 'AgamaController@destroy');
Route::post('agama/hapus', 'AgamaController@deleteSelected');

// Untuk Controller dan View Pendidkan
Route::resource('pendidikan', 'PendidikanController');
Route::get('pendidikan/destroy/{id}', 'PendidikanController@destroy');
Route::post('pendidikan/hapus', 'PendidikanController@deleteSelected');

// Untuk Controller dan View JenisPendidikan
Route::resource('jenispekerjaan', 'JenisPekerjaanController');
Route::get('jenispekerjaan/destroy/{id}', 'JenisPekerjaanController@destroy');
Route::post('jenispekerjaan/hapus', 'JenisPekerjaanController@deleteSelected');

// Untuk Controller dan View StatusPerkawinan
Route::resource('perkawinan', 'PerkawinanController');
Route::get('perkawinan/destroy/{id}', 'PerkawinanController@destroy');
Route::post('perkawinan/hapus', 'PerkawinanController@deleteSelected');

// Untuk Controller dan View HubunganKeluarga
Route::resource('hubungankeluarga', 'HubunganKeluargaController');
Route::get('hubungankeluarga/destroy/{id}', 'HubunganKeluargaController@destroy');

// Untuk Controller mustahiq dan View mustahiq
Route::resource('mustahiq', 'MustahiqController');
Route::get('mustahiq/destroy/{id}', 'MustahiqController@destroy');
Route::post('mustahiq/hapus', 'MustahiqController@deleteSelected');

// Untuk Controller muzakki dan View muzakki
Route::resource('muzakki', 'MuzakkiController');
Route::get('muzakki/destroy/{id}', 'MuzakkiController@destroy');
Route::post('muzakki/fetch', 'MuzakkiController@fetch')->name('muzakki.fetch');
Route::post('muzakki/hapus', 'MuzakkiController@deleteSelected');

// Untuk Controller mustahiq dan View mustahiq
Route::resource('harga', 'HargaController');
Route::get('harga/destroy/{id}', 'mustahiqController@destroy');

Auth::routes();
