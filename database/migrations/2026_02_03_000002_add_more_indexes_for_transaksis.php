<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->index('kendaraan_id', 'transaksis_kendaraan_id_idx');
            $table->index('user_id', 'transaksis_user_id_idx');
            $table->index('created_at', 'transaksis_created_at_idx');
        });
    }

    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksis_kendaraan_id_idx');
            $table->dropIndex('transaksis_user_id_idx');
            $table->dropIndex('transaksis_created_at_idx');
        });
    }
};
