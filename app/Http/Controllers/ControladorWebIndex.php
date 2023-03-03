<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ModeloEscuadra;
use  App\Models\ModeloClasificacion;
use  App\Models\ModeloJugador;
use  App\Models\ModeloLider;


class ControladorWebIndex extends Controller
{
    public function index()
    {
        $cla = new ModeloClasificacion();
        $escu = new ModeloEscuadra();
        $escuadra = $escu->obtenerTodos();
        $clasificacion = $cla->obtenerTodo();
        return view('index', compact('escuadra', 'clasificacion'));
    }
    public function info(){
        return view('info');
    }
   

    
}
