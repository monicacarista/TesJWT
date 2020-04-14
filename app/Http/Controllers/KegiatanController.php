<?php

namespace App\Http\Controllers;

use App\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $id_donatur = DB::table('donaturs')->pluck("id_donatur");
        $kegiatans = DB::table('kegiatans')
        ->join('donaturs', 'donaturs.id_donatur', '=', 'kegiatans.id_donatur')
        ->select('kegiatans.*', 'donaturs.nama_donatur')
        ->get();
          
        return response()->json(compact('kegiatans'),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {


        $id_donasi = DB::table('donasis')->pluck("id_donasi");
        $id_donatur = DB::table('donaturs')->pluck("id_donatur");
        DB::table('kegiatans')->insert([
            'id_donasi'=>$request->input('id_donasi'),
            'id_donatur'=>$request->input('id_donatur'),
            'nama_kegiatan'=>$request->input('nama_kegiatan'),
            'tempat_kegiatan'=>$request->input('tempat_kegiatan'),
            'tgl_kegiatan'=>$request->input('tgl_kegiatan')
           
        ]);
        return response()->json([
            'id_donasi'=>$request->id_donasi,
            'id_donatur'=>$request->id_donatur,
            'nama_kegiatan'=>$request->nama_kegiatan,
            'tempat_kegiatan'=>$request->tempat_kegiatan,
             'tgl_kegiatan'=>$request->tgl_kegiatan
        ],200);
       
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
    public function update(request $request, $id_kegiatan)
    {
        
        //$kegiatan= kegiatan::find($id);
        // $kegiatan->id_kegiatan = $request->get('id_kegiatan');
        // $kegiatan->id_donasi = $request->get('id_donasi');
        // $kegiatan->id_donatur = $request->get('id_donatur');
        // $kegiatan->nama_kegiatan = $request->get('nama_kegiatan');
        // $kegiatan->tempat_kegiatan = $request->get('tempat_kegiatan');
        // $kegiatan->tgl_kegiatan = $request->get('tgl_kegiatan');
        // $kegiatan->save();
       // return response()->json(compact('kegiatan'));
       $data = DB::table('kegiatans')->where('id_kegiatan', $id_kegiatan)->update([
        'nama_kegiatan'=>$request->nama_kegiatan,
        'tgl_kegiatan'=>$request->tgl_kegiatan,
         'tempat_kegiatan'=>$request->tempat_kegiatan,
         
        
    ]);
    return response()->json([
        'nama_kegiatan'=>$request->nama_kegiatan,
        'tgl_kegiatan'=>$request->tgl_kegiatan,
         'tempat_kegiatan'=>$request->tempat_kegiatan,
             
    ],200);
    }
    public function delete($id_kegiatan){
        $blog = DB::table('kegiatans')->where('id_kegiatan',$id_kegiatan)->delete();

        return "data berhasil dihapus";
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
