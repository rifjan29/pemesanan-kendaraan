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
        Schema::create('vehicle_reserved', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id');
            $table->bigInteger('employee_id');
            $table->bigInteger('vehicle_id');
            $table->string('no_transaksi');
            $table->text('desc')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->text('reason');
            $table->enum('status_reserved',['pending','ditolak','diterima']);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_reserved');
    }
};
