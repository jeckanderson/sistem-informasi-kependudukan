<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelahiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahirans', function (Blueprint $table) {
            $table->id('id_kelahiran', 11);
            $table->foreignId('nomor_kk', 100);
            $table->string('no_akte', 100);
            $table->string('nama', 100);
            $table->string('jender', 100);
            $table->string('berat', 100);
            $table->string('tempat_bersalin', 100);
            $table->string('penolong_lahir', 100);
            $table->string('hari_lahir', 100);
            $table->string('TTL', 100);
            $table->string('tahun_pendataan', 100);
            $table->string('nama_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->string('lingkungan', 100);
            $table->string('tgl_pendataan', 100);
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
        Schema::dropIfExists('kelahirans');
    }
}
