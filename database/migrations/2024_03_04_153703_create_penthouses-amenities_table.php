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
        Schema::create('penthouses_amenities', function (Blueprint $table) {
            
            $table->uuid('id')->primary();

            $table->foreignUuId('penthouse_id')
            ->constrained('penthouses')
            ->cascadeOnDelete()
            ->restrictOnUpdate();

            $table->foreignId('amenity_id')->nullable()->index()->constrained('amenities');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penthouses_amenities');
    }
};
