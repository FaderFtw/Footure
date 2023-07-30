<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Matche;
use App\Models\League;
use App\Models\Score;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Users::factory(10)->create();

        User::factory()->admin()->create([
            'name' => 'Test Admin',
            'password' => 'fady',
            'image' => 'profile-images/TestAdmin.png',
        ]);

        User::factory()->user()->create([
            'name' => 'Test User',
            'password' => 'fady',
            'email' => 'fady@fady.com',
            'image' => 'profile-images/Fady.png',
        ]);

        League::factory(5)->create();

        $teams1 = Team::factory(3)->create([
            'league_id' => 1
        ]);

        $teams2 = Team::factory(3)->create([
            'league_id' => 2
        ]);

        $teams3 = Team::factory(3)->create([
            'league_id' => 3
        ]);

        User::factory(3)->player()->create([
            'image' => 'profile-images/Fady.png',
            'team_id' => 1
        ]);

        User::factory(3)->player()->create([
            'image' => 'profile-images/Fady.png',
            'team_id' => 2
        ]);

        User::factory(3)->player()->create([
            'image' => 'profile-images/Fady.png',
            'team_id' => 3
        ]);

        Matche::factory()->create([
            'team_id_home' => $teams1[0],
            'team_id_away' => $teams1[1],
            'league_id' => 1,
            'date' => now()
        ]);

        Matche::factory()->create([
            'team_id_home' => $teams1[0],
            'team_id_away' => $teams1[2],
            'league_id' => 1,
            'date' => now()
        ]);

        Matche::factory()->create([
            'team_id_home' => $teams2[0],
            'team_id_away' => $teams2[1],
            'league_id' => 2,
            'date' => now()
        ]);

        Matche::factory()->create([
            'team_id_home' => $teams2[1],
            'team_id_away' => $teams2[2],
            'league_id' => 2,
            'date' => now()
        ]);

        Matche::factory()->create([
            'team_id_home' => $teams3[0],
            'team_id_away' => $teams3[1],
            'league_id' => 3,
            'date' => now()
        ]);

        Matche::factory()->create([
            'team_id_home' => $teams3[0],
            'team_id_away' => $teams3[2],
            'league_id' => 3,
            'date' => now()
        ]);

    }
}
