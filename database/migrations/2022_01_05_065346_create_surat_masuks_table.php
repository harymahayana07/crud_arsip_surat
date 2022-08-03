<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function ($table) {
            $table->bigIncrements('id');
            $table->string('noSmasuk');
            $table->date('tglMasuk');
            $table->date('tglTerima');
            $table->string('pengirim');
            $table->string('perihal');
            $table->string('no_agenda');
            $table->text('file');
            $table->string('disposisi');
            $table->unsignedBigInteger('jenisSurat_id');
            $table->foreign('jenisSurat_id')->references('id')->on('jenis_surat');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
