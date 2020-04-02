<?php

namespace App\Http\Controllers;

use App\jenis_donatur;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JenisDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return jenis_donatur::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $jenis_donatur= new jenis_donatur;
       
        $jenis_donatur->nama_jenis_donatur=$request->nama_jenis_donatur;
        $jenis_donatur->save();
        return response()->json(compact('jenis_donatur'));
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
     * @param  \App\jenis_donatur $jenis_donatur
     * @return \Illuminate\Http\Response
     */
    public function show(jenis_donatur $jenis_donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jenis_donatur  $jenis_donatur
     * @return \Illuminate\Http\Response
     */
    public function edit(jenis_donatur $jenis_donatur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jenis_donatur  $jenis_donatur
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id_jenis_donatur)
    {
        $data = DB::table('jenis_donaturs')->where('id_jenis_donatur', $id_jenis_donatur)->update([
            'nama_jenis_donatur'=>$request->nama_jenis_donatur,
        ]);
        return response()->json([
            'nama_jenis_donatur'=>$request->nama_jenis_donatur,
            
        ],200);



        return response()->json(compact('jenis_donatur'));
    }
    public function delete($id_jenis_donatur){
        $jenis_donatur= jenis_donatur::find($id_jenis_donatur);
        $jenis_donatur->delete();

        return"data berhasil dihapus";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jenis_donatur  $jenis_donatur
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenis_donatur $jenis_donatur)
    {
        //
    }
}
