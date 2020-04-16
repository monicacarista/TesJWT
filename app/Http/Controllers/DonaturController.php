<?php

namespace App\Http\Controllers;

use App\donatur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_jenis_donatur = DB::table('jenis_donaturs')->pluck("id_jenis_donatur");
        $nama_jenis_donatur = DB::table('jenis_donaturs')->pluck("nama_jenis_donatur");
        $donaturs = DB::table('donaturs')
        ->join('jenis_donaturs', 'donaturs.id_jenis_donatur', '=', 'jenis_donaturs.id_jenis_donatur')
        ->select('donaturs.*', 'jenis_donaturs.nama_jenis_donatur')
        ->get();
          
        return response()->json($donaturs);
        // DB::table('donaturs')
        // ->join('jenis_donaturs', function ($join) {
        //     $join->on('donaturs.id_jenis_donatur', '=', 'jenis_donaturs.id_jenis_donatur')
        //     ->select('donaturs.*', 'jenis_donaturs.nama_jenis_donatur');
        // })
        // ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        
        $id_jenis_donatur = DB::table('jenis_donaturs')->pluck("id_jenis_donatur");
       
            DB::table('donaturs')->insert([
            'id_jenis_donatur'=>$request->input('id_jenis_donatur'),
            'nama_donatur'=>$request->input('nama_donatur'),
            'jenis_kelamin'=>$request->input('jenis_kelamin'),
            'no_hp'=>$request->input('no_hp'),
            'alamat_donatur'=>$request->input('alamat_donatur'),
            'email_donatur'=>$request->input('email_donatur')
           
        ]);
        return response()->json([
            'nama_donatur'=>$request->nama_donatur,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_hp'=>$request->no_hp,
            'id_jenis_donatur'=>$request->id_jenis_donatur,
             'alamat_donatur'=>$request->alamat_donatur,
             'email_donatur'=>$request->email_donatur,
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
     * @param  \App\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function show(donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function edit(donatur $donatur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_donatur)
    {
       
        $data = DB::table('donaturs')->where('id_donatur', $id_donatur)->update([
            'id_jenis_donatur'=>$request->id_jenis_donatur,
            'nama_donatur'=>$request->nama_donatur,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_hp'=>$request->no_hp,
             'alamat_donatur'=>$request->alamat_donatur,
             'email_donatur'=>$request->email_donatur,
        ]);
        return response()->json([
            'id_jenis_donatur'=>$request->id_jenis_donatur,
            'nama_donatur'=>$request->nama_donatur,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'no_hp'=>$request->no_hp,
             'alamat_donatur'=>$request->alamat_donatur,
             'email_donatur'=>$request->email_donatur,
        ],200);
    }
    public function delete( $id_donatur){
        $blog = DB::table('donaturs')->where('id_donatur',$id_donatur)->delete();

    return "data berhasil dihapus";
       }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\donatur  $donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy(donatur $donatur)
    {
        //
    }
    
     public function getJenisDonatur()
         {
            $hasil= DB::table('jenis_donaturs')->pluck("nama_jenis_donatur");
            foreach ($hasil as $hasil) {
                echo $hasil;
            }
           // return view('lihatdata',['liat'=>$hasil]);
           return response()->json(compact('jenis_donaturs'));
         }
}
