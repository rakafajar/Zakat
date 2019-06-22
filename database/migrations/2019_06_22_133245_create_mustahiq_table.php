<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMustahiqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mustahiq', function (Blueprint $table) {
            $table->increments('id_mustahiq');
            $table->integer('id_anggotakk')->unsigned();
            $table->integer('id_golongan')->unsigned();
            $table->enum('wilayah', ['Internal', 'Eksternal']);
            $table->timestamps();
            //Relasi
            $table->foreign('id_anggotakk')->references('id_anggotakk')->on('tb_anggotakk')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('id_golongan')->references('id_golongan')->on('tb_golongan')->onDelete('RESTRICT')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_mustahiq');
    }
}
