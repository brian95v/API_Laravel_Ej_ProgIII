<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnidadesCurriculares extends Model
{
    use HasFactory; 

     //Especifico el Nombre de la Tabla porque no sigo la nomezclatura de Laravel de colocar los Nombre de los modelos en minúscula
    protected $table = 'unidades_curriculares';

    protected $fillable = ['matNombre', 'carrera_id'];

    //Declarar el Uno a muchos con Carreras
    public function carrera(): BelongsTo{
        return $this->belongsTo(Carreras::class, 'carrera_id');
    }
}

