<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Participante;


class asistencia extends Model
{
    use HasFactory;
    protected $fillable =['asistencia', 'participante_id'];
    
    public function participa(): BelongsTo
    {
        return $this->belongsTo(Participante::class);
    }

    public function trabajador(): BelongsTo
    {
        return $this->belongsTo(Trabajador::class);
    }
}
