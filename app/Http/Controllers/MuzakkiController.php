<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\MuzakkiModel;
use App\ViewMuzakkiModel;
use App\ViewAnggotakkModel;

class MuzakkiController extends Controller
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
        $muzakki = ViewMuzakkiModel::all();
        return view('muzakki.index', compact('muzakki'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_anggotakk = DB::table('view_anggotakk')
                            ->groupBy('no_kk')
                            ->get();
        return view('muzakki.create', compact('view_anggotakk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $muzakki = new MuzakkiModel;
        $muzakki->id_anggotakk = $request['id_anggotakk'];
        $muzakki->save();

        return redirect(route('muzakki.index'))->with('success','Data Berhasil Disimpan!');
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
        $muzakki = MuzakkiModel::find($id);
        return view('muzakki.edit', compact('muzakki'));
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
        $muzakki = MuzakkiModel::find($id);
        $muzakki->id_kk = $request['id_kk'];
        $muzakki->id_anggotakk = $request['id_anggotakk'];
        $muzakki->update();

        return redirect(route('muzakki.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_muzakki')->where('id_muzakki', '=', $id)->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $a = explode('+', $dependent);
        $data = DB::table('view_anggotakk')
                ->where($select, $value)
                ->groupBy($a[0])
                ->get();
        $output = "<option value=''>Pilih</option>";
        $id = $a[0];
        $nama = $a[1];
        foreach ($data as $row) {
            $output .= '<option value="'.$row->$id.'">
                '.$row->$nama.'</option>';
        }
        echo $output;
    } 
}
