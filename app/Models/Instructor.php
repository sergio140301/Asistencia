<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Lista;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable =['nombre', 'apellidoP', 'apellidoM', 'rfc', 'tipoInstructor'];

    public function lista(): HasMany
    {
        return $this->hasMany(Lista::class);
    }
}
