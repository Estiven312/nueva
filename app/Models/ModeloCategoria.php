<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class ModeloCategoria extends Model
{
    use HasFactory;

    public function obtenerTodos()
    {

        $sql = "SELECT 
         idcategoria,
         nombre

            FROM categoria ";

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
