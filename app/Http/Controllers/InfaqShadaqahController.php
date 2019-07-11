<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfaqShadaqahModel;
// use App\ViewTotalKasInshaModel;
use App\ViewInshaModel;
use App\ViewAnggotakkModel;
// use App\KasModel;
use DB;
use PDF;

class InfaqShadaqahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $insha = ViewInshaModel::all();
        $kas = DB::table('tb_kas')->where('id_kas', 1)->first();
        // $view_tot_insha = ViewTotalKasInshaModel::all();
        return view('infaqshodaqoh.index', compact('insha', 'kas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotakk = ViewAnggotakkModel::all();
        $kas = DB::table('tb_kas')->where('id_kas', 1)->first();
        return view('infaqshodaqoh.create', compact('anggotakk', 'kas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_insha' => 'required',
            'nominal_insha' => 'required|numeric',
        ]);
        $insha = new InfaqShadaqahModel;
        $insha->id_anggotakk = $request['nama_insha'];
        $insha->nominal_insha = $request['nominal_insha'];
        $insha->save();

        DB::table('tb_kas')->where('id_kas', '=', '1')->update([
            'jml_kas' => $request['nominal_insha'] + $request['jml_kas']
        ]);

        return redirect(route('infaqshadaqah.index'))->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggotakk = ViewAnggotakkModel::all();
        $insha = InfaqShadaqahModel::find($id);
        return view('infaqshodaqoh.edit', compact('insha', $insha, 'anggotakk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_insha' => 'required',
            'nominal_insha' => 'required|numeric',
        ]);
        $insha = InfaqShadaqahModel::find($id);
        $insha->id_anggotakk = $request['nama_insha'];
        $insha->nominal_insha = $request['nominal_insha'];
        $insha->update();

        // $insha = InfaqShadaqahModel::find($id);
        // $insha->id_anggotakk = $request['nama_insha'];
        // $insha->nominal_insha = $request['nominal_insha_baru'];
        // $insha->update();

        // DB::table('tb_kas_insha')->where('id_kas_insha', '=', '1')->update([
        //     'jml_kas_insha' => ($request['jml_kas_insha'] - $request['nominal_insha']) + $request['nominal_insha_baru']
        // ]);

        return redirect(route('infaqshadaqah.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_insha')->where('id_insha', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }

    public function laporanInsa()
    {
        $insha = ViewInshaModel::all();
        $view_tot_insha = ViewTotalKasInshaModel::all();
        $no = 0;
        $pdf = PDF::loadView('infaqshodaqoh.laporan', compact('insha', 'no', 'view_tot_insha'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }
    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $insha = InfaqShadaqahModel::leftJoin('view_insha', 'view_insha.id_anggotakk', '=', 'tb_insha.id_anggotakk')
            ->orderBy('tb_insha.id_anggotakk')->find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('infaqshodaqoh.invoice', compact('insha'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $insha = InfaqShadaqahModel::find($id);
            $insha->delete();
        }
        return response()->json(['warning' => "Products Deleted successfully."]);
    }
}
