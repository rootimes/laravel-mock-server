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
        Schema::create('auth_mocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auth_id')->constrained('auths')->onDelete('cascade');
            $table->foreignId('mock_id')->constrained('mocks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_mocks');
    }
};
