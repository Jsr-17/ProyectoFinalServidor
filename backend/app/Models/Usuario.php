<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "usuario";

    protected $fillable = [
        "nombre",
        "email",
        "pass"

    ];

    public function chollos()
    {
        return $this->belongsToMany(Chollo::class, 'usuario-chollo', 'id_usuario', 'id_chollo')
            ->withTimestamps();
    }
}
