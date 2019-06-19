<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartukeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kartukeluarga', function (Blueprint $table) {
            $table->increments('id_kk');
            $table->string('no_kk',20);
            $table->text('alamat');
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->string('kode_pos',10);
            $table->char('provinces_id');
            $table->char('cities_id');
            $table->char('districts_id');
            $table->char('villages_id');
            // Relasi 
            $table->foreign('provinces_id')->references('id')->on('provinces')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('districts_id')->references('id')->on('districts')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('villages_id')->references('id')->on('villages')->onDelete('RESTRICT')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tb_kartukeluarga');
    }
}
