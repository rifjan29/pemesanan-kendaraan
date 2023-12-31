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
        Schema::create('master_driver', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id');
            $table->string('name');
            $table->text('desc');
            $table->string('no_telp',13);
            $table->enum('status',['aktif','non-aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_driver');
    }
};
