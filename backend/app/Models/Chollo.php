<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
    use HasFactory;

    protected $table = "chollo";

    protected $fillable = [
        "titulo",
        "descripcion",
        "url",
        "categoria",
        "puntuacion",
        "precio",
        "precio_descuento",
        "disponible",

    ];
    public function comentarios()
    {
        //un comentario esta realacionado con un chollo por lo que usamos la clave ajena del id del chollo para identificarlo 
        return $this->hasMany(Comentario::class, 'id_chollo');
    }
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario-chollo', 'id_chollo', 'id_usuario')
            ->withTimestamps();
    }
}
