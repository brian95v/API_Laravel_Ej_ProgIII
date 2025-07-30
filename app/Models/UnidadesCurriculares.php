<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadesCurriculares extends Model
{
    protected $fillable = ['matNombre', 'carrera_id'];

    //Declarar el Uno a muchos con Carreras
    public function carrera(): BelongsTo{
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }
}

