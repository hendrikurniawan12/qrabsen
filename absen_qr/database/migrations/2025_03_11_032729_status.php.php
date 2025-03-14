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
    Schema::create('status', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug_name'); // Perbaiki nama kolom (tidak boleh ada "-")
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('status', function (Blueprint $table) {
            Schema::dropIfExists('status');
        });
    }
};
