<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePindahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pindahs', function (Blueprint $table) {
            $table->id('id_pindah');
            $table->string('nik', 16)->foreignId();
            // $table->string('nama_lengkap', 100);
            $table->string('tgl_pindah');
            $table->string('tgl_pendataan');
            $table->string('tahun_pendataan');
            $table->longText('tujuan');
            $table->string('jenis_pindah');
            $table->longText('alamat_asal');
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
        Schema::dropIfExists('pindahs');
    }
}
