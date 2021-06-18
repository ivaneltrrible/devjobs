<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'skills',
        'experiencia_id',
        'categoria_id',
        'ubicacion_id',
        'salario_id',

    ];

    //Ralacion 1:1 una vacante pertenece a una categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //Relacion de 1:1 una vacante tiene un salario de
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
    //Relacion de 1:1 una vacante tiene una ubicacion de
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    //Relacion de 1:1 una vacante tiene una experiencia de
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }
    //Relacion de 1:1 una vacante tiene un reclutador en especifico
    public function reclutador()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
}
