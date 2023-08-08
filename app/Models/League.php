<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class League extends Model
{
    use HasFactory;

    protected $table = 'leagues';
    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('country', 'like', '%' . $search . '%'));
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class)->orderBy('league_points', 'desc');
    }

    public function teamsOrderedByName(): HasMany
    {
        return $this->hasMany(Team::class)->orderBy('name');
    }

    public function matches (): HasMany
    {
        //hasOne, hasMany, belongsTo, belongToMany
        return $this->hasMany(Matche::class)->with(['score'])->orderByRaw('date ASC');
    }
}
