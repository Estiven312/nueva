<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ModeloEscuadra;
use  App\Models\Usuario;
use Session;

class ControladorEscuadra extends Controller
{
   public function index()
   {
      if (Usuario::autenticado() == true) {

         return view('sistema.escuadra');
      } else {
         return redirect('admin/login');
      }
   }


   public function lista()
   {
      if (Usuario::autenticado() == true) {

         return view('sistema.listadoEscuadras');
      } else {
         return redirect('admin/login');
      }
   }
   public function update($id)
   {
      if (Usuario::autenticado() == true) {

         $esc = new ModeloEscuadra();
         $escu = $esc->obtenerPorid($id);



         $jugador1 = $esc->obtenerPorIdJugador($escu[0]->fk_jugador1);
         $jugador2 = $esc->obtenerPorIdJugador($escu[0]->fk_jugador2);
         $jugador3 = $esc->obtenerPorIdJugador($escu[0]->fk_jugador3);
         $jugador4 = $esc->obtenerPorIdJugador($escu[0]->fk_jugador4);
         $jugador5 = $esc->obtenerPorIdJugador($escu[0]->fk_jugador5);

         $lider = $esc->obtenerPorIdLider($escu[0]->fk_lider);


         return view('sistema.escuadra', compact('escu', 'jugador1', 'jugador2', 'jugador3', 'jugador4', 'jugador5', 'lider'));
      } else {
         return redirect('admin/login');
      }
   }
   public function guardar($id, Request $request)
   {
      if (Usuario::autenticado() == true) {
         $esc = new ModeloEscuadra();
         $esc->cargarDesdeRequest($request);
         $esc->id = $id;
         $esc->guardar();

         return redirect('/admin/lista/escuadras');
      } else {
         return redirect('admin/login');
      }
   }
   public function eliminar($id)
   {
      if (Usuario::autenticado() == true) {

         $esc = new ModeloEscuadra();
         $esc->eliminar($id);
         return redirect('/admin/lista/escuadras');
      } else {
         return redirect('admin/login');
      }
   }

   public function cargarGrilla(Request $request)
   {
      if (Usuario::autenticado() == true) {
         $request = $_REQUEST;

         $entidad = new ModeloEscuadra();
         $aPos = $entidad->obtenerFiltrado();


         $data = array();
         $cont = 0;

         $inicio = $request['start'];
         $registros_por_pagina = $request['length'];

         for ($i = $inicio; $i < count($aPos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href=/admin/escuadra/" . $aPos[$i]->id . "'>" . " <i class='bi bi-eye-fill'></i>" . "</a>";
            $row[] =  $aPos[$i]->nombre;
            $row[] = "<img src='/files/" . $aPos[$i]->imagen . "' width='50px' class=\"img-thumbnail img-fluid\">";

            $row[] = $aPos[$i]->pago;

            $row[] = "<a href='/admin/escuadra/eliminar/" . $aPos[$i]->id . "'>" . " <i class='bi bi-trash-fill'></i>" . "</a>";

            $cont++;
            $data[] = $row;
         }


         $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aPos), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aPos), //cantidad total de registros en la paginacion
            "data" => $data,
         );
         return json_encode($json_data);
      } else {
         return redirect('admin/login');
      }
   }

   public function init($id){

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
       

      return view('web.grupo', compact('aJugadores'));
  }
}
