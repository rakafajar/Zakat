<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\ViewJmlInshaModel;
use App\ViewTotalKasInshaModel;
use App\ViewTotalKasFidyahModel;
use App\ViewTotalKasWakafModel;
use App\ViewTotalKasZakatFitrahModel;
use App\ViewTotalKasZakatMaalModel;
use App\KasModel;
use DB;

class DashboardController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kas_infaq = DB::table('tb_kas')->where('id_kas', 1)->first();
        $kas_wakaf = DB::table('tb_kas')->where('id_kas', 2)->first();
        $kas_fidyah = DB::table('tb_kas')->where('id_kas', 3)->first();
        $kas_zmaal = DB::table('tb_kas')->where('id_kas', 4)->first();
        $kas_zfitrah = DB::table('tb_kas')->where('id_kas', 5)->first();

        return view('dashboard', compact('kas_zfitrah', 'kas_infaq', 'kas_wakaf', 'kas_fidyah', 'kas_zmaal'));
    }
}
