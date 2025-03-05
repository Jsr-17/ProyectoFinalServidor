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
        return $this->hasMany(Comentario::class, 'id_chollo');
    }
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario-chollo', 'id_chollo', 'id_usuario')
            ->withTimestamps();
    }
}
