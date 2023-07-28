<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Score extends Model
{
    use HasFactory;

    public function match (): hasOne
    {
        //hasOne, hasMany, belongsTo, belongToMany
        return $this->hasOne(Matche::class, 'matche_id');
    }
}
