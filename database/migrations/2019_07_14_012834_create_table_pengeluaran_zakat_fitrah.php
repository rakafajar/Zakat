<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengeluaranZakatFitrah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pengeluaran_zakat_fitrah', function (Blueprint $table) {
            $table->increments('id_peng_zfitrah');
            $table->enum('wilayah', ['Internal', 'Eksternal']);
            $table->integer('id_golongan')->unsigned();
            $table->integer('jml_golongan');
            $table->integer('jml_peng_zfitrah');
            $table->integer('peng_zfitrah_org');
            $table->string('keterangan');
            //Relasi
            $table->foreign('id_golongan')->references('id_golongan')->on('tb_golongan')->onDelete('RESTRICT')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tb_pengeluaran_zakat_fitrah');
    }
}
