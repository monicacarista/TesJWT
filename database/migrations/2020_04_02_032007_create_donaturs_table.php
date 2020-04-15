<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->bigIncrements('id_donatur');
            $table->bigInteger('id_jenis_donatur')->references('id_jenis_donatur')->on('jenis_donaturs')->onDelete('restrict');
            $table->string('nama_donatur');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('alamat_donatur');
            $table->string('email_donatur')->unique();
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
        Schema::dropIfExists('donaturs');
    }
}
