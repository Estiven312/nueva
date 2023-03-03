<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ModeloClasificacion;
use App\Models\ModeloEscuadra;

require app_path() . '/start/constants.php';

use Session;
use  App\Models\Usuario;


class ControladorClasificacion extends Controller
{
    public function index()
    {
        if (Usuario::autenticado() == true) {
            $cla = new ModeloEscuadra();
            $clas = $cla->obtenerTodos();
            return view('sistema.clasificacion', compact('clas'));
        } else {
            return redirect('admin/login');
        }
    }

    public function lista()
    {


        if (Usuario::autenticado() == true) {
            $cla = new ModeloEscuadra();
            $entidad = new ModeloClasificacion();
            $aPos = $entidad->obtenerFiltrado();

            $clas = $cla->obtenerTodos();

            return view('sistema.listadoClasificacion', compact('clas'));
        } else {
            return redirect('admin/login');
        }
    }
    public function eliminar($id)
    {

        if (Usuario::autenticado() == true) {
            $entidad = new ModeloClasificacion();
            $entidad->eliminar($id);
            return redirect('/admin/lista/clacificacion');
        } else {
            return redirect('admin/login');
        }
    }
    public function update($id)
    {

        if (Usuario::autenticado() == true) {
            $clasificacion = new ModeloClasificacion();
            $cla = $clasificacion->obtenerPorId($id);

            return view('sistema.clasificacion', compact('cla'));
        } else {
            return redirect('admin/login');
        }
    }
    public function guardar(Request $request)
    {

        if (Usuario::autenticado() == true) {
            $clasi =  new ModeloClasificacion();

            $clasi->cargarDesdeRequest($request);
            if ($clasi->id != "") {


                $clasi->guardar();
                return redirect('/admin/lista/clacificacion');
            } else {
                $clasi->insertar();
                return redirect('/admin/lista/clacificacion');
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function cargarGrilla(Request $request)
    {

        if (Usuario::autenticado() == true) {
            $request = $_REQUEST;

            $entidad = new ModeloClasificacion();
            $aPos = $entidad->obtenerFiltrado();


            $data = array();
            $cont = 0;

            $inicio = $request['start'];
            $registros_por_pagina = $request['length'];

            for ($i = $inicio; $i < count($aPos) && $cont < $registros_por_pagina; $i++) {
                $row = array();
                $row[] = "<a href='/admin/clasificacion/" . $aPos[$i]->id . "'>" . " <i class='bi bi-eye-fill'></i>" . "</a>";
                $row[] =  $aPos[$i]->kills;
                $row[] =  $aPos[$i]->boyahs;
                $row[] =  $aPos[$i]->puntos;
                $row[] =  $aPos[$i]->nombre;
                $row[] = "<a href='/admin/clasificacion/eliminar/" . $aPos[$i]->id . "'>" . " <i class='bi bi-trash-fill'></i>" . "</a>";

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
}
