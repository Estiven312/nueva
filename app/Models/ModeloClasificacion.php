<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ModeloClasificacion extends Model
{
    use HasFactory;
    function cargarDesdeRequest($request)
    {
        $this->id = $request->input('id');
        $this->kills = $request->input('numKill');
        $this->boyahs = $request->input('numBoyahs');
        $this->puntos = $request->input('numPuntos');
        $this->escuadra = $request->input('lstEscuadra');



        /*$this->imagen=$request->imput('file')*/

       

        




    }
    public function insertar()
    {
        $sql = "INSERT INTO clasificacion (
                kills,
                boyahs,
                puntos,
                fk_escuadra
                

                ) VALUES (?, ?,?, ?);";
        $result = DB::insert($sql, [$this->kills, $this->boyahs, $this->puntos, $this->escuadra]);
        return $this->idnoticia = DB::getPdo()->lastInsertId();
    }
    public function guardar()
    {
        $sql = "UPDATE clasificacion SET
            kills=$this->kills,
            boyahs=$this->boyahs,
            puntos=$this->puntos
           
            WHERE id=?;";
        $affected = DB::update($sql, [$this->id]);
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT 
            A.id,
            A.kills,
            A.boyahs,
            A.puntos,
            A.fk_escuadra,
            D.nombre
            FROM clasificacion A
            JOIN escuadra D ON A.fk_escuadra = D.id
            Where A.id=? 
          ";

        $lstRetorno = DB::select($sql, [$id]);
        return $lstRetorno;
    }
    public function obtenerTodo()
    {
        $sql = "SELECT 
                A.id,
               A.kills,
                A.boyahs,
                A.puntos,
                A.fk_escuadra,
                D.nombre,
                D.imagen           
            FROM clasificacion A
            JOIN escuadra D on A.fk_escuadra=D.id
            ORDER BY A.puntos  DESC ";

        $lstRetorno = DB::select($sql,);
        return $lstRetorno;
    }


    public function eliminar($id)
    {
        $sql = "DELETE FROM clasificacion WHERE
            id=?";
        $affected = DB::delete($sql, [$id]);
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.id',
            1 => 'A.kills',
            2 => 'A.boyahs',
            3 => 'A.puntos',
            5 => 'A.escuadra',
            6 => ''
        );
        $sql = "SELECT 
                    A.id, 
                    A.kills,
                    A.boyahs,
                    A.puntos,
                    A.fk_escuadra,
                    D.nombre
                    
                   FROM  clasificacion A 
                   JOIN escuadra D on A.fk_escuadra=D.id
                   Where 1=1";
        if (!empty($request['search']['value'])) {

            $sql .= " AND ( A.kill LIKE '%" . $request['search']['value'] . "%' )";
        }


        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
    
}
