<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfaqShadaqahModel;
use App\ViewTotalKasInshaModel;
use DB;

class InfaqShadaqahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $insha = InfaqShadaqahModel::all();
        $view_tot_insha = ViewTotalKasInshaModel::all();
        return view('infaqshodaqoh.index', compact('insha', 'view_tot_insha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('infaqshodaqoh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insha = new InfaqShadaqahModel;
        $insha->nama_insha = $request['nama_insha'];
        $insha->nominal_insha = $request['nominal_insha'];
        $insha->save();

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
        $insha = InfaqShadaqahModel::find($id);
        return view('infaqshodaqoh.edit', compact('insha', $insha));
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
        $insha = InfaqShadaqahModel::find($id);
        $insha->nama_insha = $request['nama_insha'];
        $insha->nominal_insha = $request['nominal_insha'];
        $insha->update();

        return redirect(route('infaqshadaqah.index'))->with('info','Data Berhasil Diubah!');
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
}