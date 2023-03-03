<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ModeloEscuadra extends Model
{
    use HasFactory;
    function cargarDesdeRequest($request)
    {
        $this->id = $request->input('id');

        $this->pago = $request->input('lstPago');

        




        $this->lider = $request->input('txtNombreLider');

        $this->numero = $request->input('txtNumeroLider');

        $this->nombreEscuadra = $request->input('txtNombreEscuadra');



       

    }
    public function insertarEscuadra($nombre,$imagen,$pago,$id,$id2,$id3,$id4,$id5,$idLider)
    {
        $sql = "INSERT INTO escuadra (
                nombre,
                imagen,
                pago,
                fk_jugador1,
                fk_jugador2,
                fk_jugador3,
                fk_jugador4,
                fk_jugador5,
                fk_lider

                ) VALUES (?, ?,?, ?,?,?,?,?,?);";
        $result = DB::insert($sql, [$nombre,$imagen,$pago,$id,$id2,$id3,$id4,$id5,$idLider]);
        return $this->idproyecto = DB::getPdo()->lastInsertId();
    }


    public function insertarLider()
    {
        $sql = "INSERT INTO  lideres(
                nombre,
                numero
                ) VALUES (?, ? );";
        $result = DB::insert($sql, [$this->lider, $this->numero]);
        return $this->id = DB::getPdo()->lastInsertId();
    }
    public function insertarJugador($juego , $real, $imagen )
    {
        $sql = "INSERT INTO jugador (
                nombreJuego,
                nombreReal,
                imagen
                

                ) VALUES (?, ?,? );";
        $result = DB::insert($sql, [$juego,$real, $imagen]);
        return $this->id = DB::getPdo()->lastInsertId();
    }






    public function guardar()
    {
        $sql = "UPDATE escuadra SET
           
            pago='$this->pago'
            WHERE id=?";
        $affected = DB::update($sql, [$this->id]);
    }







    public function obtenerTodos()
    {

        $sql = "SELECT 
            id,
            nombre,
            imagen,
            pago,
            fk_jugador1,
            fk_jugador2,
            fk_jugador3,
            fk_jugador4,
            fk_lider

            FROM escuadra  where pago!='espera' ";

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }



    public function obtenerPorId($id)
    {

        $sql = "SELECT 
            id,
            nombre,
            imagen,
            pago,
            fk_jugador1,
            fk_jugador2,
            fk_jugador3,
            fk_jugador4,
            fk_jugador5,
            fk_lider

            FROM escuadra  Where id=?";
        $lstRetorno = DB::select($sql, [$id]);

        return $lstRetorno;
    }
    public function obtenerPorIdJugador($id)
    {

        $sql = "SELECT 
            id,
            nombreJuego,
            nombreReal,
            imagen

            FROM jugador Where id=?";
        $lstRetorno = DB::select($sql, [$id]);

        return $lstRetorno;
    }
    public function obtenerPorIdLider($id)
    {

        $sql = "SELECT 
            id,
            nombre,
            numero

            FROM lideres Where id=?";
        $lstRetorno = DB::select($sql, [$id]);

        return $lstRetorno;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM escuadra WHERE
            id=?";
        $affected = DB::delete($sql, [$id]);
    }


    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.idlugar',
            1 => 'A.nombre',
            2 => 'A.imagen',
            3 => 'A.pago'

        );
        $sql = "SELECT 
                  A.id, 
                  A.nombre,
                  A.imagen,
                  A.pago
                 FROM  escuadra A 
                 Where 1=1";
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.titulo LIKE '%" . $request['search']['value'] . "%' )";
        }
        //$sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
