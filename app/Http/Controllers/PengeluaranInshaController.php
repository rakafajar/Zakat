<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
// use App\KasModel;
use App\PengeluaranInshaModel;
use DB;

class PengeluaranInshaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kas = DB::table('tb_kas')->where('id_kas', 1)->first();
        $pengeluaran = PengeluaranInshaModel::all();
        return view('pengeluaran.pengeluaraninsha', compact('kas', 'pengeluaran'));
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
        $pengeluaran = new PengeluaranInshaModel();
        $pengeluaran->jml_peng_insha = $request['jml_peng_insha'];
        $pengeluaran->created_at = $request['tgl_pengeluaran'];
        $pengeluaran->keterangan = $request['keterangan'];
        $pengeluaran->save();

        DB::table('tb_kas')->where('id_kas', 1)->update([
            'jml_kas' => $request['jml_kas'] - $request['jml_peng_insha']
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
        $pengeluaran = PengeluaranInshaModel::find($id);
        return view('pengeluaran.editinsha', compact('pengeluaran'));
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
        $pengeluaran = PengeluaranInshaModel::find($id);
        $pengeluaran->created_at = $request['tgl_pengeluaran'];
        $pengeluaran->update();

        return redirect(route('pengeluaraninsha.index'))->with('info', 'Tanggal Pembayaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_pengeluaran_insha')->where('id_peng_insha', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $pengeluaran = PengeluaranInshaModel::find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('pengeluaran.invoiceinsha', compact('pengeluaran'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    //Delete All dengan CheckBox
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $pengeluaran = PengeluaranInshaModel::find($id);
            $pengeluaran->delete();
        }
    }
}
