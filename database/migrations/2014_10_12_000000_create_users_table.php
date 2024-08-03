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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthdate')->nullable();

            $table->text('comment')->nullable();

            $table->string('email')->unique();

            $table->foreignId('role_id')
            ->default(1)
            ->constrained('roles')
            ->cascadeOnDelete()
            ->restrictOnUpdate();

            $table->string('google_id')->nullable();
            $table->string('avatar')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
