<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('nis');
            $table->string('nama');
            $table->string('gender');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kelas');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_siswas');
    }
}
