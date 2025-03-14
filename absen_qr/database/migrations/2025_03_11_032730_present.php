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
        Schema::create('present', function (Blueprint $table) { // Ganti Schema::table() menjadi Schema::create()
            $table->id();
            $table->timestamp('date');
            $table->timestamp('in');
            $table->timestamp('out'); // Perbaiki timestamps('out') → timestamp('out')
            $table->foreignId('status_id')->constrained('status')->onDelete('cascade'); // Perbaiki onedelete() → onDelete()
            $table->timestamps(); // timestamps() tanpa parameter untuk created_at dan updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('present', function (Blueprint $table) {
            Schema::dropIfExists('present');
        });
    }
};
