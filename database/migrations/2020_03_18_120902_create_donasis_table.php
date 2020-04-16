<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('donasis', function (Blueprint $table) {
           $table->bigIncrements('id_donasi');
            $table->bigInteger('id_jenis_donasi')->references('id_jenis_donasi')->on('jenis_donasis');
            $table->bigInteger('id_donatur')->references('id_donatur')->on('donaturs');
            $table->bigInteger('id_kegiatan')->references('id_kegiatan')->on('kegiatans');
            $table->date('tgl_donasi');
            $table->integer('nilai_taksir');
            $table->integer('nominal');
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
        Schema::dropIfExists('donasis');
    }
}
