<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FidyahModel;
use App\ViewFidyahModel;
use App\ViewTotalKasFidyahModel;
use App\AnggotaKKModel;
use App\ViewAnggotakkModel;
use DB;
use PDF;
use Illuminate\View\View;

class FidyahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fidyah = ViewFidyahModel::all();
        $kas = DB::table('tb_kas')->where('id_kas', 3)->first();
        $view_tot_fidyah = ViewTotalKasFidyahModel::all();

        return view('fidyah.index', compact('fidyah', 'view_tot_fidyah', 'kas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggotakk = AnggotaKKModel::all();
        $kas = DB::table('tb_kas')->where('id_kas', 3)->first();
        return view('fidyah.create', compact('anggotakk', 'kas'));
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
            'nama_fidyah' => 'required',
            'nominal_fidyah' => 'required|numeric',
        ]);
        $fidyah = new FidyahModel;
        $fidyah->id_anggotakk = $request['nama_fidyah'];
        $fidyah->nominal_fidyah = $request['nominal_fidyah'];
        $fidyah->created_at = $request['tgl_pembayaran'];
        $fidyah->save();

        DB::table('tb_kas')->where('id_kas', '=', '3')->update([
            'jml_kas' => $request['nominal_fidyah'] + $request['jml_kas']
        ]);

        return redirect(route('fidyah.index'))->with('success', 'Data Berhasil Disimpan!');
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
        $fidyah = FidyahModel::find($id);
        $anggotakk = FidyahModel::leftJoin('view_anggotakk', 'view_anggotakk.id_anggotakk', '=', 'tb_fidyah.id_anggotakk')
            ->orderBy('tb_fidyah.id_anggotakk')->find($id);
        return view('fidyah.edit', compact('fidyah', $fidyah, 'anggotakk'));
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
        //     'nama_fidyah' => 'required',
        //     'nominal_fidyah' => 'required|numeric',
        // ]);
        $fidyah = FidyahModel::find($id);
        // $fidyah->id_anggotakk = $request['nama_fidyah'];
        // $fidyah->nominal_fidyah = $request['nominal_fidyah'];
        $fidyah->created_at = $request['tgl_pembayaran'];
        $fidyah->update();

        return redirect(route('fidyah.index'))->with('info', 'Tanggal Pembayaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_fidyah')->where('id_fidyah', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function laporanFidyah()
    {
        $fidyah = ViewFidyahModel::all();
        $view_tot_fidyah = ViewTotalKasFidyahModel::all();
        $no = 0;
        $pdf = PDF::loadView('fidyah.laporan', compact('fidyah', 'no', 'view_tot_fidyah'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }
    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $fidyah = FidyahModel::leftJoin('view_anggotakk', 'view_anggotakk.id_anggotakk', '=', 'tb_fidyah.id_anggotakk')
            ->orderBy('tb_fidyah.id_anggotakk')->find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('fidyah.invoice', compact('fidyah'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $fidyah = FidyahModel::find($id);
            $fidyah->delete();
        }
        return response()->json(['warning' => "Products Deleted successfully."]);
    }
}
