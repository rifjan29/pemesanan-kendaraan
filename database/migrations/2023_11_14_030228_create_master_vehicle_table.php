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
        Schema::create('master_vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jenis_bahan_bakar');
            $table->bigInteger('harga');
            $table->string('merk');
            $table->string('plat_nomor');
            $table->date('jadwal_service');
            $table->date('tahun');
            $table->text('desc')->nullable();
            $table->text('riwayat_pemakaian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_vehicle');
    }
};
