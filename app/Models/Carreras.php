<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carreras extends Model
{
    use HasFactory; 
    
    //Especifico el Nombre de la Tabla porque no sigo la nomezclatura de Laravel de colocar los Nombre de los modelos en minúscula
    protected $table = 'carreras';
    
    //define qué atributos pueden ser asignados masivamente
    protected $fillable = ['carNombre'];

    //Declarar el Uno a mucho con UnidadesCurriculares
    //Agrego el 2do parámetro "carrera_id para especificar la forentKey"
    public function unidadesCurriculares(): HasMany{
        return $this->hasMany(UnidadesCurriculares::class, 'carrera_id');
    }
}
