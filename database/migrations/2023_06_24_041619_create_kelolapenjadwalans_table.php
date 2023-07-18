<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelolapenjadwalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelolapenjadwalans', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_mata_pelajaran');
            $table->string('mata_pelajaran');
            $table->integer('idkelas');
            $table->string('guru');
            $table->string('jurusan');
            $table->date('tanggal');
            $table->time('waktu');
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
        Schema::dropIfExists('kelolapenjadwalans');
    }
}
