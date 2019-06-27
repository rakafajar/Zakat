<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZakatFitrahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_zakat_fitrah', function (Blueprint $table) {
            $table->increments('id_zfitrah');
            $table->integer('id_muzakki')->unsigned();
            $table->integer('harga_beras');
            $table->integer('nominal');
            $table->timestamps();
            //Relasi
            $table->foreign('id_muzakki')->references('id_muzakki')->on('tb_muzakki')->onDelete('RESTRICT')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_zakat_fitrah');
    }
}
