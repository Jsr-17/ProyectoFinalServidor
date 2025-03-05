<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = "comentario";

    protected $fillable = [
        'mensaje',
        'id_usuario',
        'id_chollo',
        'id_comentario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function chollo()
    {
        return $this->belongsTo(Chollo::class, 'id_chollo');
    }

    public function respuestas()
    {
        return $this->hasMany(Comentario::class, 'id_comentario');
    }
}
