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
        Schema::create('penthouses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->string('title', 255)
                ->collation('utf8mb4_unicode_ci')
                ->index()
                ;
            $table->text('description')
                ->collation('utf8mb4_unicode_ci')
                ;
            $table->decimal('price', 12, 2)
                ->index()
                ;
 
            $table->string('image', 191)
                ->collation('utf8mb4_unicode_ci')
                ->default('default.jpg')
                ;

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete()
                ->restrictOnUpdate()
                ;

            $table->foreignUuid('user_id')->nullable()
            ->constrained('users')
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
        Schema::dropIfExists('products');
    }
};
