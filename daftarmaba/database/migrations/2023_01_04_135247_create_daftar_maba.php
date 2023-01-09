<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarmaba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_maba', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Pendaftar');
            $table->string('Tempat_Lahir');
            $table->date('Tanggal_Lahir');
            $table->longText('Alamat');
            $table->string('Jalur_Masuk');
            $table->string('Prodi');
            $table->string('Sekolah_Asal');
            $table->integer('No_hp');
            $table->string('Email');
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
        Schema::dropIfExists('daftar_maba');
    }
}
