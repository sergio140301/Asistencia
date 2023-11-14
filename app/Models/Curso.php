<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Lista;

class Curso extends Model
{
    use HasFactory;
    protected $fillable =['nombreCurso', 'areaTematica', 'fechaInicio', 'fechaFinal', 'duracion'];

    public function lista(): HasMany
    {
        return $this->hasMany(Lista::class);
    }
}
