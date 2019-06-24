<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuzakkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_muzakki', function (Blueprint $table) {
            $table->increments('id_muzakki');
            $table->integer('id_anggotakk')->unsigned();
            $table->timestamps();
            //Relasi
            $table->foreign('id_anggotakk')->references('id_anggotakk')->on('tb_anggotakk')->onDelete('RESTRICT')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_muzakki');
    }
}
