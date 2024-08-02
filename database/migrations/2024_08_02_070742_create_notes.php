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
        Schema::create('notes', function (Blueprint $table) {
            $table->ulid()->primary();
            $table->string('title', 200);
            $table->text('content')->nullable();
            $table->enum('color', ['red', 'blue', 'yellow', 'green', 'purple', 'pink', 'gray', 'white'])->default('white');
            $table->foreignUlid('user_ulid')->constrained('users', 'ulid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
