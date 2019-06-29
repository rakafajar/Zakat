<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZakatMaalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_zakat_maal', function (Blueprint $table) {
            $table->increments('id_zmaal');
            $table->integer('id_muzakki')->unsigned();
            $table->integer('harga_emas');
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
        Schema::dropIfExists('tb_zakat_maal');
    }
}
