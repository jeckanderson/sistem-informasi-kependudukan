<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepalas', function (Blueprint $table) {
            $table->string('nomor_kk', 16)->primary();
            $table->string('no_telpon', 12);
            $table->string('nama_kecamatan');
            $table->string('nama_kelurahan');
            $table->string('nama_lingkungan');
            $table->char('kode_rw', 3);
            $table->char('kode_rt', 3);
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
        Schema::dropIfExists('kepalas');
    }
}
