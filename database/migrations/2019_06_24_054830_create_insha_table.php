<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInshaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_insha', function (Blueprint $table) {
            $table->increments('id_insha');
            $table->integer('id_anggotakk')->unsigned();
            $table->integer('nominal_insha');
            $table->foreign('id_anggotakk')->references('id_anggotakk')->on('tb_anggotakk')->onDelete('RESTRICT')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tb_insha');
    }
}
