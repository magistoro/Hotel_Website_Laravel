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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)
                ->collation('utf8mb4_unicode_ci')
                ->unique()
                ->index()
                ;
            $table->decimal('price', 10, 2)
            ->index()
            ;
            $table->text('description')
                ->collation('utf8mb4_unicode_ci')
                ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
