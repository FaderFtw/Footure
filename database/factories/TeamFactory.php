<?php

namespace Database\Factories;

use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = 'FC '.fake() ->word;
        return [
            'name' => $name,
            'logo' => 'teams-logos/'.$this->faker->randomElement(['Atletico Madrid.png','FC Barcelona.png','FC Bayern Munich.png','Liverpool.png','Manchester City.png','Real Madrid.png',]),
            'slug' => str_replace(' ', '-', $name),
            'coach' => fake() ->firstNameMale,
            'stadium' => fake() ->word.' '.fake() ->word,
            'city' => fake() ->city,
            'capacity' => fake() ->numberBetween(10000,100000),
            'founded_at' => fake()->date,
            'league_id' => League::factory(),
        ];
    }
}
