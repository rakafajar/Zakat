<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisWakafModel;
use DB;

class JenisWakafController extends Controller
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
        $jenis_wakaf = JenisWakafModel::all();

        return view('jeniswakaf.index', compact('jenis_wakaf', $jenis_wakaf));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeniswakaf.create');
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
            'jenis_wakaf' => 'required',
        ]);
        $jenis_wakaf = new JenisWakafModel();
        $jenis_wakaf->jenis_wakaf = $request['jenis_wakaf'];
        $jenis_wakaf->save();

        return redirect(route('jeniswakaf.index'))->with('success', 'Data Berhasil Disimpan!');
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
        $jenis_wakaf = JenisWakafModel::find($id);
        return view('jeniswakaf.edit', compact('jenis_wakaf', $jenis_wakaf));
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
            'jenis_wakaf' => 'required',
        ]);
        $jenis_wakaf = JenisWakafModel::find($id);
        $jenis_wakaf->jenis_wakaf = $request['jenis_wakaf'];
        $jenis_wakaf->update();

        return redirect(route('jeniswakaf.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_jeniswakaf')->where('id_jeniswakaf', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $jenis_wakaf = JenisWakafModel::find($id);
            $jenis_wakaf->delete();
        }
        return response()->json(['warning' => "Products Deleted successfully."]);
    }
}
