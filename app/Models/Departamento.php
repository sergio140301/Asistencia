<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Trabajador;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable =['nombreDepto', 'nombreCorto'];

    public function trabajador(): HasMany
    {
        return $this->hasMany(Trabajador::class);
    }
}
