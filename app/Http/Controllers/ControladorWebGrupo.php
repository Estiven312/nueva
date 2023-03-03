<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ModeloEscuadra;
use  App\Models\ModeloClasificacion;
use  App\Models\ModeloJugador;
use  App\Models\ModeloLider;

class ControladorWebGrupo extends Controller
{


    public function init($id)
    {
        return view('web.grupo');
    }
   
    public function index($id)
    {
        $escu = new ModeloEscuadra();

        $valor = $escu->obtenerPorId($id);

        $juga1 = $escu->obtenerPorIdJugador($valor[0]->fk_jugador1);
        $juga2 = $escu->obtenerPorIdJugador($valor[0]->fk_jugador2);
        $juga3 = $escu->obtenerPorIdJugador($valor[0]->fk_jugador3);
        $juga4 = $escu->obtenerPorIdJugador($valor[0]->fk_jugador4);
        $juga5 = $escu->obtenerPorIdJugador($valor[0]->fk_jugador5);
        $aJugadores = array(
            $juga1,
            $juga2,
            $juga3,
            $juga4,
            $juga5
        );
        print_r($aJugadores);
        exit;

        return view('grupo', compact('aJugadores'));
    }
 
}
