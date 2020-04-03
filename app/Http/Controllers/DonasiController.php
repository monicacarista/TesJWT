<?php

namespace App\Http\Controllers;

use App\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Donasi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $donasi = new Donasi;
     
        // $donasi ->id_donasi = $request->id_donasi;
        $donasi ->id_jenis_donasi = $request->id_jenis_donasi;
        $donasi ->id_donatur= $request->id_donatur;
        $donasi ->id_kegiatan= $request->id_kegiatan;
        $donasi ->tgl_donasi = $request->tgl_donasi;
        $donasi ->nominal = $request->nominal;
        $donasi->save();

        // return "Data Berhasil Masuk";
        return response()->json(compact('donasi'));      //utk 1 variabel

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
     * @param  \App\donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function show(donasi $donasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function edit(donasi $donasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id_donasi)
    {
    
    // $donasi= Donasi::find($id);
    //  $donasi->id_donasi = $id_donasi;
    //  $donasi->id_jenis_donasi = $id_jenis_donasi;
    //  $donasi->id_donatur = $id_donatur;
    //  $donasi->id_kegiatan = $id_kegiatan;
    //  $donasi->tgl_donasi = $tgl_donasi;
    //  $donasi->nominal = $nominal;
    //  $donasi->save();

    //  return response()->json(compact('donasi'));
    $data = DB::table('donasis')->where('id_donasi', $id_donasi)->update([
        'tgl_donasi'=>$request->tgl_donasi,
        'nominal'=>$request->nominal,
      
    ]);
    return response()->json([
       // 'id_kegiatan'=>$request->id_kegiatan,
        'tgl_donasi'=>$request->tgl_donasi,
        'nominal'=>$request->nominal,
    ],200);
    }

    public function delete( $id_donasi){
        $blog = DB::table('donasis')->where('id_donasi',$id_donasi)->delete();

    return "data berhasil dihapus";
       }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\donasi  $donasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(donasi $donasi)
    {
        //
    }
}
