<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WakafModel;
use App\ViewWakafModel;
use App\JenisWakafModel;
use App\ViewAnggotakkModel;
use App\ViewTotalKasWakafModel;
use DB;
use PDF;

class WakafController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $view_wakaf = ViewWakafModel::all();
        $view_tot_wakaf = ViewTotalKasWakafModel::all();
        $kas = DB::table('tb_kas')->where('id_kas', 2)->first();
        return view('wakaf.index', compact('view_wakaf', 'view_tot_wakaf', 'kas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotakk = ViewAnggotakkModel::all();
        $jenis_wakaf = JenisWakafModel::all();
        $kas = DB::table('tb_kas')->where('id_kas', 2)->first();
        return view('wakaf.create', compact('jenis_wakaf', 'anggotakk', 'kas'));
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
            'nama_wakaf' => 'required',
            'jenis_wakaf' => 'required',
            'nominal_wakaf' => 'required|numeric'
        ]);
        $wakaf = new WakafModel;
        $wakaf->id_anggotakk = $request['nama_wakaf'];
        $wakaf->id_jeniswakaf = $request['jenis_wakaf'];
        $wakaf->nominal_wakaf = $request['nominal_wakaf'];
        $wakaf->created_at = $request['tgl_pembayaran'];
        $wakaf->save();

        DB::table('tb_kas')->where('id_kas', '=', '2')->update([
            'jml_kas' => $request['nominal_wakaf'] + $request['jml_kas']
        ]);

        return redirect(route('wakaf.index'))->with('success', 'Data Berhasil Disimpan');
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
        // $anggotakk = ViewAnggotakkModel::all();
        $wakaf = WakafModel::find($id);
        // $jenis_wakaf = JenisWakafModel::all();
        $anggotakk = WakafModel::leftJoin('view_anggotakk', 'view_anggotakk.id_anggotakk', '=', 'tb_wakaf.id_anggotakk')
            ->orderBy('tb_wakaf.id_anggotakk')->find($id);
        $jeniswakaf = WakafModel::leftJoin('tb_jeniswakaf', 'tb_jeniswakaf.id_jeniswakaf', '=', 'tb_wakaf.id_jeniswakaf')
            ->orderBy('tb_wakaf.id_jeniswakaf')->find($id);
        return view('wakaf.edit', compact('jeniswakaf', 'wakaf', 'anggotakk'));
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
        // $this->validate($request, [
        //     'nama_wakaf' => 'required',
        //     'jenis_wakaf' => 'required',
        //     'nominal_wakaf' => 'required|numeric'
        // ]);
        $wakaf = WakafModel::find($id);
        // $wakaf->id_anggotakk = $request['nama_wakaf'];
        // $wakaf->id_jeniswakaf = $request['jenis_wakaf'];
        // $wakaf->nominal_wakaf = $request['nominal_wakaf'];
        $wakaf->created_at = $request['tgl_pembayaran'];
        $wakaf->update();

        return redirect(route('wakaf.index'))->with('info', 'Tanggal Pembayaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_wakaf')->where('id_wakaf', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function laporanWakaf()
    {
        $wakaf = ViewWakafModel::all();
        $view_tot_wakaf = ViewTotalKasWakafModel::all();
        $no = 0;
        $pdf = PDF::loadView('wakaf.laporan', compact('wakaf', 'no', 'view_tot_wakaf'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $wakaf = WakafModel::leftJoin('view_wakaf', 'view_wakaf.id_jeniswakaf', '=', 'tb_wakaf.id_jeniswakaf')
            ->orderBy('tb_wakaf.id_jeniswakaf')->find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('wakaf.invoice', compact('wakaf'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $wakaf = WakafModel::find($id);
            $wakaf->delete();
        }
        return response()->json(['warning' => "Products Deleted successfully."]);
    }
}
