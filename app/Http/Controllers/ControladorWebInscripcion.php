<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ModeloEscuadra;
use  App\Models\ModeloClasificacion;
use  App\Models\ModeloJugador;
use  App\Models\ModeloLider;

class ControladorWebInscripcion extends Controller
{
    public function index()
    {
        return view('inscripciones');
    }

    public function guardar(Request $request)
    {
        $escu = new ModeloEscuadra();
        $escu->cargarDesdeRequest($request);
        $idlider= $escu->insertarLider();





        /*Jugador 1*/

        $juego1 = $request->input('txtJuego1');
     
        $nombre1 = $request->input('txtNombre1');
       
        $nombreIma="";
        $nombreIma2="";
        $nombreIma3="";
        $nombreIma4="";
        $nombreIma5="";


        if ($_FILES["imagen1"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
            $extension = pathinfo($_FILES["imagen1"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ymdhsi") . ".$extension";
            $archivo = $_FILES["imagen1"]["tmp_name"];
            if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                move_uploaded_file($archivo, "files/" . $nombre);
            } else {
                return "";
            }

            $nombreIma = $nombre;
        }
       $id1= $escu->insertarJugador($juego1,$nombre1,$nombreIma);





        /*Jugador 2*/
        $juego2 = $request->input('txtJuego2');
        $nombre2 = $request->input('txtNombre2');

        if ($_FILES["imagen2"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
            $extension = pathinfo($_FILES["imagen2"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ymdhs") . ".$extension";
            $archivo = $_FILES["imagen2"]["tmp_name"];
            if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                move_uploaded_file($archivo, "files/" . $nombre);
            } else {
                return "";
            }

            $nombreIma2 = $nombre;
        }
      $id2=  $escu->insertarJugador($juego2,$nombre2,$nombreIma2);





        /*Jugador 1*/

        $juego3 = $request->input('txtJuego3');
        $nombre3 = $request->input('txtNombre3');
        if ($_FILES["imagen3"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
            $extension = pathinfo($_FILES["imagen3"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ymdhi") . ".$extension";
            $archivo = $_FILES["imagen3"]["tmp_name"];
            if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                move_uploaded_file($archivo, "files/" . $nombre);
            } else {
                return "";
            }

            $nombreIma3 = $nombre;
        }

        $id3= $escu->insertarJugador($juego3,$nombre3,$nombreIma3);


        /*Jugador 5*/
        $juego4 = $request->input('txtJuego4');
        $nombre4 = $request->input('txtNombre4');
        if ($_FILES["imagen4"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
            $extension = pathinfo($_FILES["imagen4"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ymdsi") . ".$extension";
            $archivo = $_FILES["imagen4"]["tmp_name"];
            if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                move_uploaded_file($archivo, "files/" . $nombre);
            } else {
                return "";
            }

            $nombreIma4 = $nombre;
        }


        $id4= $escu->insertarJugador($juego4,$nombre4,$nombreIma4);

        /*Jugador 5*/
        $juego5 = $request->input('txtJuego5');
        $nombre5 = $request->input('txtNombre5');
        if ($_FILES["imagen5"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
            $extension = pathinfo($_FILES["imagen5"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ymdh") . ".$extension";
            $archivo = $_FILES["imagen5"]["tmp_name"];
            if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                move_uploaded_file($archivo, "files/" . $nombre);
            } else {
                return "";
            }

            $nombreIma5 = $nombre;
        }

        $listIdJugadores = [];
        $id5=$escu->insertarJugador($juego5,$nombre5,$nombreIma5);


        /*Incertar escuadra */

        $logo = "";
        if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
            $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ydhsi") . ".$extension";
            $archivo = $_FILES["archivo"]["tmp_name"];
            if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                move_uploaded_file($archivo, "files/" . $nombre);
            } else {
                return "";
            }

            $logo = $nombre;
        }
        $pago="espera";
        $nombre = $request->input('txtNombreEscuadra');
     
      
        $escu->insertarEscuadra($nombre,$logo,$pago,$id1,$id2,$id3,$id4,$id5,$idlider);
    }
    public function gracias(){
        return view('gracias');
    }
}
