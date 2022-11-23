<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kematians', function (Blueprint $table) {
            $table->id('id_kematian');
            $table->string('nik', 16)->foreignId();
            $table->string('tgl_meninggal');
            $table->string('tempat_meninggal', 100);
            $table->longText('sebab');
            $table->string('tgl_pendataan');
            $table->string('tahun_pendataan');
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
        Schema::dropIfExists('kematians');
    }
}
