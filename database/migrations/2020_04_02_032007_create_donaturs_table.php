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
            $table->increments('id');
            $table->string('id_donatur');
            $table->string('nama_donatur');
            $table->string('id_jenis_donatur');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('alamat_donatur');
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
