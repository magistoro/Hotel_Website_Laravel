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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('order_id')
            ->constrained('orders')
            ->cascadeOnDelete()
            ->restrictOnUpdate();

            $table->foreignUuid('user_id')
            ->constrained('users')
            ->cascadeOnDelete()
            ->restrictOnUpdate();

            $table->foreignUuid('room_id')
            ->constrained('rooms')
            ->cascadeOnDelete()
            ->restrictOnUpdate();

            $table->timestamp('settled_at')->nullable();
            $table->timestamp('checked_out_at')->nullable();
            $table->timestamp('canceled_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
