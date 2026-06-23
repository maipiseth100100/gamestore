<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            // Main game image
            $table->string('image')->nullable();

            // Multiple screenshots
            $table->json('screenshots')->nullable();

            // Youtube trailer
            $table->string('trailer_url')->nullable();

            $table->decimal('price', 10, 2);

            $table->longText('description')->nullable();

            $table->boolean('featured')
                  ->default(false);

            $table->boolean('latest_games')
                  ->default(false);

            $table->boolean('status')
                  ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};