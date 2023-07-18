<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelolagurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelolagurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->date('ttl');
            $table->integer('nip')->unique();
            $table->integer('nuptk')->unique();
            $table->integer('nomor_nrg')->unique();
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('pendidikan_terakhir');
            $table->string('jabatan');
            $table->string('mata_pelajaran');
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
        Schema::dropIfExists('kelolagurus');
    }
}
