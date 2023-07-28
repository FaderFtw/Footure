<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\League>
 */
class LeagueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake() ->word;
        return [
            'name' =>  $name,
            'slug' => str_replace(' ', '-', $name),
            'country' =>  fake() ->country,
            'desc' => fake() ->paragraph,
            'logo' => 'leagues-logos/'.$this->faker->randomElement(['La-Liga.png','Premier-League1.png','Bundesliga.png']),
            'founder' =>  fake() ->name,
            'founded_at' => fake() ->date,
        ];
    }
}
