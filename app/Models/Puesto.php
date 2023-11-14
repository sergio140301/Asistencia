<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Trabajador;

class Puesto extends Model
{
    use HasFactory;
    protected $fillable =['nombrePuesto', 'experiencia', 'categoria'];

    public function trabajador(): HasMany
    {
        return $this->hasMany(Trabajador::class);
    }
}
