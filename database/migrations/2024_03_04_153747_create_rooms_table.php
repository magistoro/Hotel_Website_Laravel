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
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 255)
                ->collation('utf8mb4_unicode_ci')
                ->unique()
                ->index()
                ;
            $table->text('description')
                ->collation('utf8mb4_unicode_ci')
                ->nullable()
                ;
            $table->decimal('price_per_night', 12, 2)
                ->index()
                ;
           $table->integer('people_count')
                ->index()
                ;
            $table->string('image', 256)
                ->collation('utf8mb4_unicode_ci')
                ->default('default.jpg')
                ;

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete()
                ->restrictOnUpdate()
                ;

            $table->foreignId('status_id')
                ->constrained('room_statuses')
                ->cascadeOnDelete()
                ->restrictOnUpdate()
                ;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
