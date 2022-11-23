<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string('nomor_kk', 16)->foreignId();
            $table->string('nama_lengkap', 50);
            $table->enum('jender', ['L', 'P']);
            $table->enum('status_nikah', ['Menikah', 'Janda', 'Duda', 'Lajang', 'Tidak Menikah']);
            $table->enum('relasi', ['Suami', 'Istri', 'Anak Kandung', 'Anak Angkat', 'Keponakan', 'Lain-lain']);
            // $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama');
            // $table->enum('golongan_darah', ['A','B','AB','O']);
            $table->string('pendidikan');
            $table->string('pekerjaan');
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
        Schema::dropIfExists('penduduks');
    }
}
