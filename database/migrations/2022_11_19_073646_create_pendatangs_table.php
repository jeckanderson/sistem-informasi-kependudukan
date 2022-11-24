<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendatangs', function (Blueprint $table) {
            $table->id('id_pendatang');
            $table->foreignId('nik', 16);
            // $table->int('id_penduduk', 11);
            $table->string('tgl_datang');
            $table->string('alamat_asal', 100);
            $table->string('alamat_tujuan', 100);
            $table->string('alasan_datang');
            $table->string('tgl_pendataan');
            $table->string('tahun_pendataan', 100);
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
        Schema::dropIfExists('pendatangs');
    }
}
