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
           $table->increments('id');
            $table->string('id_donasi');
            $table->string('id_jenis_donasi');
            $table->string('id_donatur');
            $table->string('id_kegiatan');
            $table->date('tgl_donasi');
            $table->string('nominal');
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
