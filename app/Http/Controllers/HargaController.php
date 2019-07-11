<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HargaModel;
use DB;

class HargaController extends Controller
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
        $harga = HargaModel::all();
        return view('harga.index', compact('harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harga.create');
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
            'harga_beras' => 'required|numeric',
        ]);
        $harga = new HargaModel;
        $harga->harga_beras = $request['harga_beras'];
        $harga->save();

        return redirect(route('harga.index'))->with('success', 'Data Berhasil Disimpan!');
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
        $harga = HargaModel::find($id);
        return view('harga.edit', compact('harga'));
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
            'harga_beras' => 'required|numeric',
        ]);
        $harga = HargaModel::find($id);
        $harga->harga_beras = $request['harga_beras'];
        $harga->update();

        return redirect(route('harga.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_harga')->where('id_harga', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $harga = HargaModel::find($id);
            $harga->delete();
        }
        return response()->json(['warning' => "Products Deleted successfully."]);
    }
}
