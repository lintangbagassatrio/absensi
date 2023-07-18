<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->integer('kodematapelajaran')->unique();
            $table->date('tanggal');
            $table->string('matapelajaran');
            $table->string('kelas');
            $table->time('waktu');
            $table->string('guru');
            $table->integer('nomorinduk')->unique();
            $table->integer('nisn')->unique();
            $table->string('namasiswa');
            $table->string('kehadiran');
            $table->string('keterangan');
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
        Schema::dropIfExists('absensis');
    }
}
