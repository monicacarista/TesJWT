<?php

namespace App\Http\Controllers;

use App\jenis_donasi;
use Illuminate\Http\Request;

class JenisDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return jenis_donasi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $jenis_donasi= new jenis_donasi;
        $jenis_donasi->id_jenis_donasi=$request->id_jenis_donasi;
        $jenis_donasi->nama_jenis_donasi=$request->nama_jenis_donasi;
        $jenis_donasi->save();
        return response()->json(compact('jenis_donasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jenis_donasi  $jenis_donasi
     * @return \Illuminate\Http\Response
     */
    public function show(jenis_donasi $jenis_donasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenis_donasi  $jenis_donasi
     * @return \Illuminate\Http\Response
     */
    public function edit(jenis_donasi $jenis_donasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenis_donasi  $jenis_donasi
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
    //    $id_jenis_donasi = $request->id_jenis_donasi;
    //    $nama_jenis_donasi = $request->nama_jenis_donasi;

        $jenis_donasi= jenis_donasi::find($id);
        $jenis_donasi->id_jenis_donasi = $request->get('id_jenis_donasi');
        $jenis_donasi->nama_jenis_donasi = $request->get('nama_jenis_donasi');
        $jenis_donasi->save();



        return response()->json(compact('jenis_donasi'));
    }

    public function delete($id){
        $jenis_donasi= jenis_donasi::find($id);
        $jenis_donasi->delete();

        return"data berhasil dihapus";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenis_donasi  $jenis_donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenis_donasi $jenis_donasi)
    {
        //
    }
}
