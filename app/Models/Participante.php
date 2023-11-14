<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Trabajador;
use App\Models\Lista;
use App\Models\asistencia;

class Participante extends Model
{
    use HasFactory;
    protected $fillable =['trabajador_id', 'lista_id'];

    public function trabajador(): BelongsTo
    {
        return $this->belongsTo(Trabajador::class);
    }
    
    public function lista(): BelongsTo
    {
        return $this->belongsTo(Lista::class);
    }

    public function asis(): HasMany
    {
        return $this->hasMany(asistencia::class);
    }
}
