<?php

namespace App\Http\Controllers;


use App\Models\ModeloNoticias;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;

require app_path() . '/start/constants.php';

class ControladorNoticias extends Controller
{
    public function index()
    {
        return view('sistema.noticia');
    }
    public function listar()
    {
        return view('sistema.listadoNoticias');
    }

    public function guardar(Request $request)
    {
        $noticia = new ModeloNoticias();
        $noticia->cargarDesdeRequest($request);

        if ($noticia->idnoticia != "") {

           
            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
                $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
                $nombre = date("Ymdhmsi") . ".$extension";
                $archivo = $_FILES["archivo"]["tmp_name"];
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                    move_uploaded_file($archivo, "files/" . $nombre);
                } else {
                    return "";
                }

                $noticia->imagen = $nombre;
            }

            $eliminar = $noticia->obtenerPorId($noticia->idnoticia);
            $imagen = $eliminar[0]->imagen;
         
            if($noticia->imagen!=""){

                @unlink("files/$imagen");
            }else{
                $noticia->imagen=$imagen;
            }
            $noticia->guardar();
            return redirect('/admin/noticias');


        } else {
            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
                $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
                $nombre = date("Ymdhmsi") . ".$extension";
                $archivo = $_FILES["archivo"]["tmp_name"];
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "jfif" || $extension == "png") {
                    move_uploaded_file($archivo, "files/" . $nombre);
                } else {
                    return "";
                }

                $noticia->imagen = $nombre;
            }
            $noticia->insertar();
            return redirect('/admin/noticias');
        }
    }

    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new ModeloNoticias();
        $aPos = $entidad->obtenerFiltrado();


        $data = array();
        $cont = 0;

        $inicio = 0; /*0$request['start'];*/
        $registros_por_pagina = 10;/*$request['length'];*/

        for ($i = $inicio; $i < count($aPos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/noticia/" . $aPos[$i]->idnoticia . "'>" . " <i class='bi bi-eye-fill'></i>" . "</a>";
            $row[] =  $aPos[$i]->titulo;
            $row[] = $aPos[$i]->descripcion;

            $row[] = $aPos[$i]->fecha;
            $row[] = "<img src='/files/" . $aPos[$i]->imagen . "' width='50px' class=\"img-thumbnail img-fluid\">";
            $row[] = "<a href='/admin/noticia/eliminar/" . $aPos[$i]->idnoticia . "'>" . " <i class='bi bi-trash-fill'></i>" . "</a>";


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
    }
    public function update($id, Request $request)
    {
        $noticia = new ModeloNoticias();

        $update = $noticia->obtenerPorId($id);
        return view('sistema.noticia', compact('update'));
    }
    public function eliminar($id)
    {
        $noticia = new ModeloNoticias();
        $eliminar = $noticia->obtenerPorId($id);
        $imagen = $eliminar[0]->imagen;
        @unlink("files/$imagen");
        $noticia->eliminar($id);
        return redirect('/admin/noticias');
    }
}
