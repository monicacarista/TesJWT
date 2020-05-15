<?php

namespace App\Http\Controllers;

use App\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id_jenis_donasi = DB::table('jenis_donasis')->pluck("id_jenis_donasi");
        // $id_donatur = DB::table('donaturs')->pluck("id_donatur");
        // $id_kegiatan = DB::table('kegiatans')->pluck("id_kegiatan");
        
        $donasis = DB::table('donasis')
        ->join('jenis_donasis', 'donasis.id_jenis_donasi', '=', 'jenis_donasis.id_jenis_donasi')
        ->join('donaturs', 'donasis.id_donatur', '=', 'donaturs.id_donatur')
        ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
        ->select('donasis.*', 'donaturs.nama_donatur','jenis_donasis.nama_jenis_donasi','nama_kegiatan')
        
        ->get();
        
        return response()->json(compact('donasis'),200);
        
    }

    public function laporanGrafik()
    {
        $donasis = DB::table('donasis')
                ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
                ->select('donasis.id_kegiatan', DB::raw('SUM(nilai_taksir) as jumlah_donasi'), 'kegiatans.nama_kegiatan')
                ->orderBy('kegiatans.tgl_kegiatan','desc')
                ->take(10)
                ->groupBy('donasis.id_kegiatan','nama_kegiatan')
                ->get();

        return response()->json(compact('donasis'),200);
        
    }
    public function laporanSemuaKegiatan()
    {
        $donasis = DB::table('donasis')
                ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
                ->select('kegiatans.id_kegiatan', DB::raw('SUM(nilai_taksir) as jumlah_donasi'), 'kegiatans.nama_kegiatan', 'kegiatans.tempat_kegiatan','kegiatans.tgl_kegiatan')
                ->groupBy('kegiatans.id_kegiatan','nama_kegiatan','tempat_kegiatan','tgl_kegiatan')
                ->get();
             
        $data = DB::table('donasis')
            //     ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
            // //    ->select('donasis.id_donasi', DB::raw('SUM(nilai_taksir) as jumlah_semua_donasi'))
            //     ->where('donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
            //     ->sum('nilai_taksir');

           ->get()->sum("nilai_taksir");
        return response()->json(compact('donasis','data'),200);
        
    }
    
    public function laporanPerKegiatan(request $request, $id_kegiatan)
    {
      //  $nilai_taksir = DB::table('donasis')->pluck("nilai_taksir");
        $donasis = DB::table('donasis')->where('donasis.id_kegiatan', $id_kegiatan)
            ->join('jenis_donasis', 'donasis.id_jenis_donasi', '=', 'jenis_donasis.id_jenis_donasi')
                ->join('donaturs', 'donasis.id_donatur', '=', 'donaturs.id_donatur')
                ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
                ->select('donasis.id_donatur','donasis.id_kegiatan', DB::raw('SUM(nilai_taksir) as jumlah_donasi_donatur'),'nama_donatur','nama_jenis_donasi','keterangan')
                ->groupBy('donasis.id_donatur','donasis.id_kegiatan','nama_donatur','nama_jenis_donasi','keterangan')
                ->get();
        $data = DB::table('donasis')->where('donasis.id_kegiatan', $id_kegiatan)
                ->join('donaturs', 'donasis.id_donatur', '=', 'donaturs.id_donatur')
                ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
                ->select('donasis.id_kegiatan', 'nama_kegiatan',DB::raw('SUM(nilai_taksir) as jumlah_donasi'))
                ->groupBy('donasis.id_kegiatan','nama_kegiatan')
                ->get();
        return response()->json(compact('donasis','data'),200);
        
    }
    public function laporanJenisDonasiSemuaKegiatan()
    {
                   
         $data = DB::table('donasis')
                ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
                ->join('jenis_donasis', 'donasis.id_jenis_donasi', '=', 'jenis_donasis.id_jenis_donasi')
                ->select('donasis.id_jenis_donasi', DB::raw('SUM(donasis.nilai_taksir) as total_jenis_donasi'),'jenis_donasis.nama_jenis_donasi')
                ->groupBy('donasis.id_jenis_donasi','jenis_donasis.nama_jenis_donasi')
                ->get();
             
        return response()->json(compact('data'),200);
        
    }
    public function laporanJenisDonasiPerKegiatan(request $request, $id_kegiatan)
    {
        $donasis = DB::table('donasis')->where('donasis.id_kegiatan', $id_kegiatan)
                ->join('kegiatans', 'donasis.id_kegiatan', '=', 'kegiatans.id_kegiatan')
                ->join('jenis_donasis', 'donasis.id_jenis_donasi', '=', 'jenis_donasis.id_jenis_donasi')
                ->select('donasis.id_kegiatan','kegiatans.nama_kegiatan', DB::raw('SUM(donasis.nilai_taksir) as total_jenis_donasi'),'jenis_donasis.nama_jenis_donasi')
                ->groupBy('donasis.id_kegiatan','jenis_donasis.nama_jenis_donasi','kegiatans.nama_kegiatan')
                ->get();
             
        
        return response()->json(compact('donasis'),200);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {

        $id_jenis_donasi = DB::table('jenis_donasis')->pluck("id_jenis_donasi");
        $id_donatur = DB::table('donaturs')->pluck("id_donatur");
        $id_kegiatan = DB::table('kegiatans')->pluck("id_kegiatan");
        
       
        DB::table('donasis')->insert([
            'id_jenis_donasi'=>$request->input('id_jenis_donasi'),
            'id_donatur'=>$request->input('id_donatur'),
            'id_kegiatan'=>$request->input('id_kegiatan'),
            'tgl_donasi'=>$request->input('tgl_donasi'),
            'nilai_taksir'=>$request->input('nilai_taksir'),
            'keterangan'=>$request->input('keterangan'),
            'nominal'=>$request->input('nominal')

           
        ]);
        return response()->json([
            'id_jenis_donasi'=>$request->id_jenis_donasi,
            'id_donatur'=>$request->id_donatur,
            'id_kegiatan'=>$request->id_kegiatan,
            'tgl_donasi'=>$request->tgl_donasi,
            'nilai_taksir'=>$request->nilai_taksir,
            'keterangan'=>$request->keterangan,
             'nominal'=>$request->nominal,
             
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
        'id_jenis_donasi'=>$request->id_jenis_donasi,
        'id_donatur'=>$request->id_donatur,
        'id_kegiatan'=>$request->id_kegiatan,
        'tgl_donasi'=>$request->tgl_donasi,
        'nilai_taksir'=>$request->nilai_taksir,
        'keterangan'=>$request->keterangan,
        'nominal'=>$request->nominal,
      
    ]);
    return response()->json([
        'id_jenis_donasi'=>$request->id_jenis_donasi,
        'id_donatur'=>$request->id_donatur,
       'id_kegiatan'=>$request->id_kegiatan,
        'tgl_donasi'=>$request->tgl_donasi,
        'nilai_taksir'=>$request->nilai_taksir,
        'keterangan'=>$request->keterangan,
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
