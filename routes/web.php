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
    return view('dashboard');
});

// Untuk Controller dan View KartuKeluarga
Route::resource('kartukeluarga', 'KartuKeluargaController');
Route::post('kartukeluarga/fetch', 'KartuKeluargaController@fetch')->name('kartukeluarga.fetch');

// Untuk Controller dan View AnggotaKeluarga
Route::resource('anggotakeluarga', 'AnggotaKeluargaController');
Route::get('anggotakeluarga/destroy/{id}','AnggotaKeluargaController@destroy');

// Untuk Controller Golongan dan View Mustahiq
Route::resource('golongan', 'GolonganController');
Route::get('mustahiq/destroy/{id}','GolonganController@destroy');

// Untuk Controller dan View Zakat Fitrah
Route::resource('zakatfitrah', 'ZakatFitrahController');

// Untuk Controller dan View Zakat MAal
Route::resource('zakatmaal', 'ZakatMaalController');

// Untuk Controller dan View Waqaf
Route::resource('waqaf', 'WaqafController');

// Untuk Controller dan View Infaq & Shodaqoh
Route::resource('infaqshodaqoh', 'InfaqShodaqohController');

// Untuk Controller dan View Fidyah
Route::resource('fidyah', 'FidyahController');

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
Route::get('agama/destroy/{id}','AgamaController@destroy');

// Untuk Controller dan View Pendidkan
Route::resource('pendidikan', 'PendidikanController');
Route::get('pendidikan/destroy/{id}','PendidikanController@destroy');

// Untuk Controller dan View JenisPendidikan
Route::resource('jenispekerjaan', 'JenisPekerjaanController');
Route::get('jenispekerjaan/destroy/{id}','JenisPekerjaanController@destroy');

// Untuk Controller dan View StatusPerkawinan
Route::resource('perkawinan', 'PerkawinanController');
Route::get('perkawinan/destroy/{id}','PerkawinanController@destroy');

// Untuk Controller dan View HubunganKeluarga
Route::resource('hubungankeluarga', 'HubunganKeluargaController');
Route::get('hubungankeluarga/destroy/{id}','HubunganKeluargaController@destroy');
