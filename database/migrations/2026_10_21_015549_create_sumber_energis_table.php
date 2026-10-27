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
        Schema::create('sumber_energi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_energi');
            $table->string('jenis_energi');
            $table->decimal('kapasitas', 10, 2);
            $table->string('lokasi');
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_energi');
    }
};
