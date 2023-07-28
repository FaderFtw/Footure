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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('coach')->unique();
            $table->string('stadium');
            $table->bigInteger('capacity');
            $table->string('city');
            $table->date('founded_at');
            $table->string('logo')->nullable();
            $table->integer('matches_played')->default(0);
            $table->integer('nbW')->default(0);
            $table->integer('nbD')->default(0);
            $table->integer('nbL')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->integer('goals_scored')->default(0);
            $table->integer('league_points')->default(0);
            $table->foreignId('league_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
