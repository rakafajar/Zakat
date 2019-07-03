<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\ViewJmlInshaModel;
use App\ViewTotalKasInshaModel;
use App\ViewTotalKasFidyahModel;
use App\ViewTotalKasWakafModel;
use App\ViewTotalKasZakatFitrahModel;
use App\ViewTotalKasZakatMaalModel;

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
        // $view_jml_insha = ViewJmlInshaModel::all();
        $view_tot_insha = ViewTotalKasInshaModel::all();
        $view_tot_fidyah = ViewTotalKasFidyahModel::all();
        $view_tot_wakaf = ViewTotalKasWakafModel::all();
        $view_tot_zfitrah = ViewTotalKasZakatFitrahModel::all();
        $view_tot_zmaal = ViewTotalKasZakatMaalModel::all();

        return view('dashboard', compact('view_tot_insha', 'view_tot_wakaf', 'view_tot_fidyah', 'view_tot_zfitrah', 'view_tot_zmaal'));
    }
}
