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
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mock_id')->constrained('mocks')->cascadeOnDelete();
            $table->foreignId('schema_id')->constrained('schemas')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('in', ['query', 'path', 'header', 'cookie']);
            $table->boolean('required')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameters');
    }
};
