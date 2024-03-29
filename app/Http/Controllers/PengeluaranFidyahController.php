<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengeluaranFidyahModel;
use DB;
use PDF;

class PengeluaranFidyahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kas = DB::table('tb_kas')->where('id_kas', 3)->first();
        $pengeluaran = PengeluaranFidyahModel::all();
        return view('pengeluaran.pengeluaranfidyah', compact('kas', 'pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengeluaran = new PengeluaranFidyahModel();
        $pengeluaran->jml_peng_fidyah = $request['jml_peng_fidyah'];
        $pengeluaran->created_at = $request['tgl_pengeluaran'];
        $pengeluaran->keterangan = $request['keterangan'];
        $pengeluaran->save();

        DB::table('tb_kas')->where('id_kas', 3)->update([
            'jml_kas' => $request['jml_kas'] - $request['jml_peng_fidyah']
        ]);

        return back()->with('success', 'Pengeluaran Berhasil!');
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
        $pengeluaran = PengeluaranFidyahModel::find($id);
        return view('pengeluaran.editfidyah', compact('pengeluaran'));
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
        $pengeluaran = PengeluaranFidyahModel::find($id);
        $pengeluaran->created_at = $request['tgl_pengeluaran'];
        $pengeluaran->update();

        return redirect(route('pengeluaranfidyah.index'))->with('info', 'Tanggal Pembayaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_pengeluaran_fidyah')->where('id_peng_fidyah', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }

    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $pengeluaran = PengeluaranFidyahModel::find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('pengeluaran.invoicefidyah', compact('pengeluaran'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    //Delete All dengan CheckBox
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $pengeluaran = PengeluaranFidyahModel::find($id);
            $pengeluaran->delete();
        }
    }
}
