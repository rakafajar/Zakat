<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\MustahiqModel;
use App\ViewMustahiqModel;
use App\AnggotaKKModel;
use App\GolonganModel;

class MustahiqController extends Controller
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
        $mustahiq = ViewMustahiqModel::all();
        return view('mustahiq.index', compact('mustahiq', $mustahiq));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = GolonganModel::all();
        $anggotakk = AnggotaKKModel::all();
        $mustahiq = ViewMustahiqModel::all();
        return view('mustahiq.create', compact('mustahiq', 'anggotakk', 'golongan'));
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
            'nomor_kk' => 'required',
            'golongan' => 'required',
            'wilayah' => 'required'
        ]);
        $mustahiq = new MustahiqModel;
        $mustahiq->id_anggotakk = $request['nomor_kk'];
        $mustahiq->id_golongan = $request['golongan'];
        $mustahiq->wilayah = $request['wilayah'];
        $mustahiq->save();

        return redirect(route('mustahiq.index'))->with('success', 'Data Berhasil Disimpan!');
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
        $golongan = GolonganModel::all();
        $anggotakk = AnggotaKKModel::all();
        $mustahiq = MustahiqModel::find($id);
        return view('mustahiq.edit', compact('mustahiq', 'anggotakk', 'golongan'));
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
            'nomor_kk' => 'required',
            'golongan' => 'required',
            'wilayah' => 'required'
        ]);
        $mustahiq = new MustahiqModel;
        $mustahiq->id_anggotakk = $request['nomor_kk'];
        $mustahiq->id_golongan = $request['golongan'];
        $mustahiq->wilayah = $request['wilayah'];
        $mustahiq->update();

        return redirect(route('mustahiq.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_mustahiq')->where('id_mustahiq', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    //Delete All dengan CheckBox
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $mustahiq = MustahiqModel::find($id);
            $mustahiq->delete();
        }
        return response()->json(['warning'=>"Products Deleted successfully."]);
    }
}
