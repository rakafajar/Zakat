<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FidyahModel;
use App\ViewTotalKasFidyahModel;
use DB;

class FidyahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fidyah = FidyahModel::all();
        $view_tot_fidyah = ViewTotalKasFidyahModel::all();

        return view('fidyah.index', compact('fidyah', 'view_tot_fidyah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fidyah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fidyah = new FidyahModel;
        $fidyah->nama_fidyah = $request['nama_fidyah'];
        $fidyah->nominal_fidyah = $request['nominal_fidyah'];
        $fidyah->save();

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

        return view('fidyah.edit', compact('fidyah', $fidyah));
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
        $fidyah = FidyahModel::find($id);
        $fidyah->nama_fidyah = $request['nama_fidyah'];
        $fidyah->nominal_fidyah = $request['nominal_fidyah'];
        $fidyah->save();

        return redirect(route('fidyah.index'))->with('info','Data Berhasil Diubah!');
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
}