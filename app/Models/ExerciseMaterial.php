<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ExerciseMaterial extends Model
{
    protected $fillable = ['chapter', 'chapter_number', 'content', 'video', 'material_id', 'isExercise'];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
