<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Curso;
use App\Models\Instructor;
use App\Models\Participante;

class Lista extends Model
{
    use HasFactory;
    protected $fillable =['horaInicio', 'horaFinal', 'lugar', 'curso_id', 'instructor_id'];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
    
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }
    public function participante(): HasMany
    {
        return $this->hasMany(Participante::class);
    }
}
