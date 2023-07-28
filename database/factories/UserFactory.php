<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;

    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => $this->faker->password,
            'age' => $this->faker->numberBetween(10, 100),
            'country' => $this->faker->country,
            'role' => $this->faker->randomElement([User::ADMIN, User::PLAYER, User::USER]),
            'remember_token' => Str::random(10),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (User $user) {
            if ($user->role === User::PLAYER) {
                $user->position = $this->faker->randomElement(['Striker', 'Midfielder', 'Defender']);
                $user->atkRate = $this->faker->numberBetween(1, 100);
                $user->midRate = $this->faker->numberBetween(1, 100);
                $user->defRate = $this->faker->numberBetween(1, 100);
                $user->rating = intval(($user->atkRate + $user->midRate + $user->defRate) / 3);
            }
        });
    }

    public function player(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => User::PLAYER,
            ];
        });
    }

    public function admin(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => User::ADMIN,
                'team_id' => null,
                'position' => null,
                'atkRate' => null,
                'midRate' => null,
                'defRate' => null,
                'rating' => null,
            ];
        });
    }

    public function user(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => User::USER,
                'team_id' => null,
                'position' => null,
                'atkRate' => null,
                'midRate' => null,
                'defRate' => null,
                'rating' => null,
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
