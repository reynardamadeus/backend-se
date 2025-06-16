<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $fillable = ['name', 'class', 'image'];

    public function lessons(): HasMany
    {
        return $this->hasMany(LessonMaterial::class);
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(ExerciseMaterial::class);
    }
}
