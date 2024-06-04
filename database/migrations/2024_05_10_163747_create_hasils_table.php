<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_beasiswa');
            $table->string('penghasilan');
            $table->string('tanggungan');
            $table->string('pekerjaan');
            $table->string('asset');
            $table->float('ahp');
            $table->timestamps();

            $table->foreign('id_siswa')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_beasiswa')->references('id')->on('beasiswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasils');
    }
}
