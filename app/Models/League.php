<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class League extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class)->orderBy('league_points', 'desc');
    }

    public function matches (): HasMany
    {
        //hasOne, hasMany, belongsTo, belongToMany
        return $this->hasMany(Matche::class)->with(['score'])->orderByRaw('date ASC, time ASC');
    }
}
