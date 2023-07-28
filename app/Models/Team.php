<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function players (): HasMany
    {
        //hasOne, hasMany, belongsTo, belongToMany
        return $this->hasMany(User::class, 'team_id')->orderBy('position', 'asc');
    }

    public function league (): BelongsTo
    {
        //hasOne, hasMany, belongsTo, belongToMany
        return $this->belongsTo(League::class);
    }

    public function homeMatches(): hasMany
    {
        return $this->hasMany(Matche::class, 'team_id_home')->orderByRaw('date ASC, time ASC');
    }

    public function awayMatches(): hasMany
    {
        return $this->hasMany(Matche::class, 'team_id_away')->orderByRaw('date ASC, time ASC');
    }

    public function averageAge(): int
    {
        $players = $this->players;

        if ($players->count() === 0) {
            return 0; // Return 0 if there are no players in the team to avoid division by zero
        }

        $totalAge = $players->sum('age');
        $averageAge = $totalAge / $players->count();

        return (int) $averageAge;
    }
}
