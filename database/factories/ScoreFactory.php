<?php

namespace Database\Factories;

use App\Models\Matche;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'homeTeamScore' => fake() ->numberBetween(10,0),
            'awayTeamScore' => fake() ->numberBetween(10,0),
        ];
    }
}
