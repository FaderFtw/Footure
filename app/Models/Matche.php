<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Matche extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $guarded = [];

    public function league (): BelongsTo
    {
        //hasOne, hasMany, belongsTo, belongToMany
        return $this->belongsTo(League::class);
    }

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id_home');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id_away');
    }

    public function score (): BelongsTo
    {
        //hasOne, hasMany, belongsTo, belongToMany
        return $this->belongsTo(Score::class);
    }


}
