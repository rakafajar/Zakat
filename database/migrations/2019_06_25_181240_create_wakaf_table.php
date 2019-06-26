<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWakafTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_wakaf', function (Blueprint $table) {
            $table->increments('id_wakaf');
            $table->string('nama_wakaf');
            $table->integer('id_jeniswakaf')->unsigned();
            $table->integer('nominal_wakaf');
            //Relasi
            $table->foreign('id_jeniswakaf')->references('id_jeniswakaf')->on('tb_jeniswakaf')->onDelete('
                RESTRICT')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tb_wakaf');
    }
}
