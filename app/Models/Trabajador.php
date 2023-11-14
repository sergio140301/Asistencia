<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Departamento;
use App\Models\Puesto;
use App\Models\Participante;

class Trabajador extends Model
{
    use HasFactory;
    protected $fillable =['nombre', 'apellidoP', 'apellidoM', 'rfc', 'fechaIngreso', 'escolaridad', 'foto', 'departamento_id', 'puesto_id'];

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puesto::class);
    }
    public function participante(): HasMany
    {
        return $this->hasMany(Participante::class);
    }

}
