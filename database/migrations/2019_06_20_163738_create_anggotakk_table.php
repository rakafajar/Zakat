<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotakkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggotakk', function (Blueprint $table) {
            $table->increments('id_anggotakk');
            $table->string('nama_lengkap');
            $table->char('nik');
            $table->integer('id_kk')->unsigned();
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->integer('id_agama')->unsigned();
            $table->integer('id_pendidikan')->unsigned();
            $table->integer('id_pekerjaan')->unsigned();
            $table->integer('id_status_kawin')->unsigned();
            $table->integer('id_status_hubkel')->unsigned();
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->char('no_paspor');
            $table->char('no_kitap');
            $table->string('ayah');
            $table->string('ibu');
            //Relasi
            $table->foreign('id_kk')->references('id_kk')->on('tb_kartukeluarga')->onDelete('
                RESTRICT')->onUpdate('CASCADE');
            $table->foreign('id_agama')->references('id_agama')->on('tb_agama')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('id_pendidikan')->references('id_pendidikan')->on('tb_pendidikan')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('tb_jenispekerjaan')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('id_status_kawin')->references('id_status')->on('tb_statusperkawinan')->onDelete('RESTRICT')->onUpdate('CASCADE');
            $table->foreign('id_status_hubkel')->references('id_hubkeluarga')->on('tb_hubkeluarga')->onDelete('RESTRICT')->onUpdate('CASCADE');
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
        Schema::dropIfExists('tb_anggotakk');
    }
}
