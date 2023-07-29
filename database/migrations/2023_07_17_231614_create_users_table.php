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
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('age');
            $table->string('country')->nullable();
            $table->string('image')->nullable();
            $table->integer('role');
            $table->enum('position', ['Striker', 'Midfielder ', 'Defender'])->nullable();
            $table->foreignId('team_id')->nullable()->constrained();
            $table->integer('rating')->nullable();
            $table->integer('atkRate')->nullable();
            $table->integer('midRate')->nullable();
            $table->integer('defRate')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
