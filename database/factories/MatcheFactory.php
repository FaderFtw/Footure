<?php

namespace Database\Factories;

use App\Models\League;
use App\Models\Score;
use App\Models\Team;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matche>
 */
class MatcheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake() ->dateTime;
        $today = new DateTime();


        if($date <= $today)
            $score = Score::factory();
        else
            $score = null;

        $league = League::factory();

        return [
            'date' => $date,
            'stadium' => fake() ->name,
            'desc' => fake() ->paragraph,
            'referee' => fake() ->name,
            'league_id' => $league,
            'team_id_home' => Team::factory(['league_id' => $league]),
            'team_id_away' => Team::factory(['league_id' => $league]),
            'score_id' => $score
        ];
    }
}
