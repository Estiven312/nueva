<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Models\Patentes;

use App\Models\ModelsUsuario;

class ControladorInicio extends Controller
{
    public function index()
    {
        $titulo = "Inicio";
        if (ModelsUsuario::autenticado() == true) {
            if (!ModelsPatente::autorizarOperacion("MENUCONSULTA")) {
                $codigo = "MENUCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('sistema.index', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }
}
