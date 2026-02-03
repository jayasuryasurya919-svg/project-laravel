<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->index('nomor_polisi', 'kendaraans_nomor_polisi_idx');
        });

        Schema::table('jenis_kendaraans', function (Blueprint $table) {
            $table->index('nama', 'jenis_kendaraans_nama_idx');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->index('tanggal', 'transaksis_tanggal_idx');
        });
    }

    public function down(): void
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->dropIndex('kendaraans_nomor_polisi_idx');
        });

        Schema::table('jenis_kendaraans', function (Blueprint $table) {
            $table->dropIndex('jenis_kendaraans_nama_idx');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksis_tanggal_idx');
        });
    }
};
