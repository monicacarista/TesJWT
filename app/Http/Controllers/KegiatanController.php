<?php

namespace App\Http\Controllers;

use App\kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return kegiatan::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $kegiatan= new kegiatan;
        // $kegiatan->id_kegiatan=$request->id_kegiatan;
        // $kegiatan->id_donasi=$request->id_donasi;
        // $kegiatan->id_donatur=$request->id_donatur;
        $kegiatan->tempat_kegiatan=$request->tempat_kegiatan;
        $kegiatan->nama_kegiatan=$request->nama_kegiatan;
        $kegiatan->tgl_kegiatan=$request->tgl_kegiatan;

        $kegiatan->save();
        return response()->json(compact('kegiatan'));
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
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        
        $kegiatan= kegiatan::find($id);
        // $kegiatan->id_kegiatan = $request->get('id_kegiatan');
        // $kegiatan->id_donasi = $request->get('id_donasi');
        // $kegiatan->id_donatur = $request->get('id_donatur');
        $kegiatan->nama_kegiatan = $request->get('nama_kegiatan');
        $kegiatan->tempat_kegiatan = $request->get('tempat_kegiatan');
        $kegiatan->tgl_kegiatan = $request->get('tgl_kegiatan');

        $kegiatan->save();



        return response()->json(compact('kegiatan'));
    }
    public function delete($id){
        $kegiatan= kegiatan::find($id);
        $kegiatan->delete();

        return"data berhasil dihapus";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kegiatan $kegiatan)
    {
        //
    }
}
