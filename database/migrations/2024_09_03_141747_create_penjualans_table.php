<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->default(1)->constrained(
                table: 'pelanggans',
            );
            $table->foreignId('petugas_id')->constrained(
                table: 'users',
            );
            $table->bigInteger('total_harga')->default(0);
            $table->bigInteger('bayar')->default(0);
            $table->enum('status', ["selesai", "pending"])->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
