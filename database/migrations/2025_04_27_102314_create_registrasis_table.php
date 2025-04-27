<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrasis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_registrasi');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter')->nullable();
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_asuransi')->nullable();
            $table->string('nomor_asuransi')->nullable()->nullable();
            $table->unsignedBigInteger('id_ruangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasis');
    }
};
