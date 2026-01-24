<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kendaraan_id');
            $table->string('nama_peminjam');
            $table->date('tanggal');
            $table->integer('lama_hari');
            $table->string('total_harga', 50); // VARCHAR
            $table->timestamps();

            $table->foreign('kendaraan_id')
                  ->references('id')
                  ->on('kendaraans')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
