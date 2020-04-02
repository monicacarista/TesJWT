<?php

namespace App\Http\Controllers;

use App\jenis_peserta;
use Illuminate\Http\Request;

class JenisPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return jenis_peserta::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $jenis_peserta= new jenis_peserta;
        $jenis_peserta->id_jenis_peserta=$request->id_jenis_peserta;
        $jenis_peserta->nama_jenis_peserta=$request->nama_jenis_peserta;
        $jenis_peserta->save();
        return response()->json(compact('jenis_peserta'));
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
     * @param  \App\jenis_peserta  $jenis_peserta
     * @return \Illuminate\Http\Response
     */
    public function show(jenis_peserta $jenis_peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenis_peserta  $jenis_peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(jenis_peserta $jenis_peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenis_peserta  $jenis_peserta
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id_jenis_peserta)
    {
        $jenis_peserta= jenis_peserta::find($id_jenis_peserta);
       // $jenis_peserta->id_jenis_peserta = $request->get('id_jenis_peserta');
        $jenis_peserta->nama_jenis_peserta = $request->get('nama_jenis_peserta');
        $jenis_peserta->save();



        return response()->json(compact('jenis_peserta'));
    }
    public function delete($id_jenis_peserta){
        $jenis_peserta= jenis_peserta::find($id_jenis_peserta);
        $jenis_peserta->delete();

        return"data berhasil dihapus";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenis_peserta  $jenis_peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenis_peserta $jenis_peserta)
    {
        //
    }
}
