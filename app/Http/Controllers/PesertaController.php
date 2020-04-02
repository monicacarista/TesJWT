<?php

namespace App\Http\Controllers;

use App\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Peserta::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $peserta = new Peserta;
        $peserta->id_peserta=$request->id_peserta;
        $peserta->nama_peserta = $request->nama_peserta;
        $peserta->id_jenis_peserta = $request->id_jenis_peserta;
        $peserta->jenis_kelamin = $request->jenis_kelamin;
        $peserta->no_hp = $request->no_hp;
        $peserta->alamat_peserta = $request->alamat_peserta;
        
        $peserta->save();

        // return "Data Berhasil Masuk";
        return response()->json(compact('peserta'));      //utk 1 variabel
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
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $nama_peserta=$request->nama_peserta;
        $id_peserta=$request->id_peserta;
        $id_jenis_peserta=$request->id_jenis_peserta;
        $jenis_kelamin=$request->jenis_kelamin;
        $no_hp=$request->no_hp;
        $alamat_peserta=$request->alamat_peserta;


        $peserta = Peserta::find($id);
        $peserta->id_peserta=$id_peserta;
        $peserta->nama_peserta=$nama_peserta;
        $peserta->id_jenis_peserta=$id_jenis_peserta;
        $peserta->jenis_kelamin=$jenis_kelamin;
        $peserta->no_hp=$no_hp;
        $peserta->alamat_peserta=$alamat_peserta;
        $peserta->save(); 

        return response()->json(compact('peserta'));
    }

    public function delete( $id){
     $peserta=Peserta::find($id);
     $peserta->delete();

     return "data berhasil dihapus";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $peserta)
    {
        //
    }
}
