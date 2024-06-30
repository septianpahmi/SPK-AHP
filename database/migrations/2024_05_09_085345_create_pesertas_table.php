<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_beasiswa');
            $table->unsignedBigInteger('id_kelas');
            $table->string('penghasilan');
            $table->string('tanggungan');
            $table->string('pekerjaan');
            $table->string('asset');
            $table->string('sktm');
            $table->string('dok_lainnya');
            $table->enum('status', ['Mendaftar', 'Ditolak', 'Diproses', 'Lolos', 'Tidak Lolos'])->default('Mendaftar');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_beasiswa')->references('id')->on('beasiswas')->onDelete('cascade');
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
        Schema::dropIfExists('pesertas');
    }
}
