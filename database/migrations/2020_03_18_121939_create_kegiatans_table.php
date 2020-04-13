<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
           
            $table->bigIncrements('id_kegiatan');
            //$table->bigInteger('id_jenis_donatur')->references('id_jenis_donatur')->on('jenis_donaturs');
            $table->bigInteger('id_donasi')->references('id_donasi')->on('donasis');
            $table->bigInteger('id_donatur')->references('id_donatur')->on('donaturs');
            $table->string('nama_kegiatan');
            $table->string('tempat_kegiatan');
            $table->date('tgl_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
}
