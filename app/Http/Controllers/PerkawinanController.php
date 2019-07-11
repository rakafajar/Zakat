<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusPerkawinanModel;
use DB;

class PerkawinanController extends Controller
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
        $status_perkawinan = StatusPerkawinanModel::all();
        return view('perkawinan.index', compact('status_perkawinan', $status_perkawinan));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perkawinan.create');
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
            'status_perkawinan' => 'required',
        ]);
        $status_perkawinan = new StatusPerkawinanModel;
        $status_perkawinan->nama_status = $request['status_perkawinan'];
        $status_perkawinan->save();

        return redirect(route('perkawinan.index'))->with('success', 'Data Berhasil Disimpan!');
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
        $status_perkawinan = StatusPerkawinanModel::find($id);
        return view('perkawinan.edit', compact('status_perkawinan', $status_perkawinan));
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
            'status_perkawinan' => 'required',
        ]);
        $status_perkawinan = StatusPerkawinanModel::find($id);
        $status_perkawinan->nama_status = $request['status_perkawinan'];
        $status_perkawinan->update();
        return redirect(route('perkawinan.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_statusperkawinan')->where('id_status', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $status_perkawinan = StatusPerkawinanModel::find($id);
            $status_perkawinan->delete();
        }
        return response()->json(['warning' => "Products Deleted successfully."]);
    }
}
