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
        Schema::create('usage_mocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mock_id')->constrained('mocks')->cascadeOnDelete();
            $table->foreignId('usage_id')->constrained('usages')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usage_mocks');
    }
};
