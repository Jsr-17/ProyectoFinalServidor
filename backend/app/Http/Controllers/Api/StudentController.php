<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        return "lista de estudiantes desde el controlador ";
    }
}
