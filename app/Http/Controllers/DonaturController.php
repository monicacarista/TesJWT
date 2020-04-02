<?php

namespace App\Http\Controllers;

use App\donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Donatur::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $donatur = new Donatur;
        $donatur->id_donatur=$request->id_donatur;
        $donatur->nama_donatur = $request->nama_donatur;
        $donatur->id_jenis_donatur = $request->id_jenis_donatur;
        $donatur->jenis_kelamin = $request->jenis_kelamin;
        $donatur->no_hp = $request->no_hp;
        $donatur->alamat_donatur = $request->alamat_donatur;
        
        $donatur->save();

        // return "Data Berhasil Masuk";
        return response()->json(compact('donatur'));      //utk 1 variabel
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
    public function update(Request $request,  $id)
    {
        $donatur = Donatur::find($id);
     //   $jenis_donatur->id_jenis_donatur = $request->get('id_jenis_donatur');
        $donatur->id_donatur=$request->get('id_donatur');
        $donatur->nama_donatur=$request->get('nama_donatur');
        $donatur->id_jenis_donatur=$request->get('id_jenis_donatur');
        $donatur->jenis_kelamin=$request->get('jenis_kelamin');
        $donatur->no_hp=$request->get('no_hp');
        $donatur->alamat_donatur=$request->get('alamat_donatur');
        $donatur->save(); 

        return response()->json(compact('donatur'));
    }
    public function delete( $id){
        $donatur=Donatur::find($id);
        $donatur->delete();
   
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
}
