<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('stadium');
            $table->text('desc');
            $table->string('referee');
            $table->foreignId('team_id_home')->constrained();
            $table->foreignId('team_id_away')->constrained();
            $table->foreignId('league_id')->constrained();
            $table->foreignId('score_id')->nullable()->constrained()->onDelete('cascade');;
            $table->timestamps();

            $table->unique(['date', 'stadium']); // Unique constraint for date and stadium
            $table->index(['stadium', 'date']);
        });

        DB::statement('ALTER TABLE matches ADD CONSTRAINT different_teams CHECK (team_id_home <> team_id_away)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
