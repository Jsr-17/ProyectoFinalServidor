<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioChollo extends Model
{
    //se HasFactory;

    protected $table = "usuario-chollo";

    protected $fillable = [
        "id_usuario",
        "id_chollo"
    ];
}
