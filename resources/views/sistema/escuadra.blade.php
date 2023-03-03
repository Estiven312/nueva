@extends('plantilla')
@section('titulo', "Datos de Escuadra")
@section('scripts')
<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script>
      globalId = '<?php echo isset($update->idlugar) && $update->idlugar > 0 ? $update->idlugar : 0; ?>';
      <?php $globalId = isset($update->idlugar) ? $update->idlugar : "0";
      ?>
</script>
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
      <li class="breadcrumb-item"><a href="/admin/usuarios">Noticia</a></li>

</ol>
<ol class="toolbar">
      <li class="btn-item"><a title="Nuevo" href="/admin/lugar" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
      <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true" onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
      </li>
      <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true" onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
</ol>
<script>
      function fsalir() {
            location.href = "/admin";
      }
</script>
@endsection
@section('contenido')
<?php
if (isset($msg)) {
      echo '<div id = "msg"></div>';
      echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
}
?>
<div class="row">
      <div id="msg"></div>
      <?php
      if (isset($msg)) {
            echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
      }
      ?>
</div>
<form id="form1" method="POST" enctype="multipart/form-data">
      <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <input type="hidden" id="id" name="id" class="form-control" value="<?php if (isset($escu)) {
                                                                                          echo $escu[0]->id;
                                                                                    } ?>">
            <div class="form-group col-lg-2">
                  <label>Escuadra: *</label>
            </div>
            <div class="form-group col-lg-4">
                  <input type="text" id="txtEscuadra" name="txtEscuadra" class="form-control" value="<?php if (isset($escu)) {
                                                                                                            echo $escu[0]->nombre;
                                                                                                      } ?>" required>
            </div>
            <div class="form-group col-lg-2">
                  <label>Nombre Lider:</label>
            </div>
            <div class="form-group col-lg-4">
                  <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value="<?php if (isset($lider)) {
                                                                                                                  echo $lider[0]->nombre;
                                                                                                            } ?>">
            </div>
            <div class="form-group col-lg-2">
                  <label>Numero Lider</label>
            </div>
            <div class="form-group col-lg-4">
                  <input type="text" id="txtDireccion" name="txtDireccion" class="form-control" value="<?php if (isset($lider)) {
                                                                                                                  echo $lider[0]->numero;
                                                                                                            } ?>">
            </div>
            <div class="form-group col-lg-2">
                  <label>Pago:</label>
            </div>
            <div class="form-group col-lg-4">

                  <select class="form-control" name="lstPago" id="" enable>

                        <?php if (isset($escu)) {
                              if ($escu[0]->pago!=""&& $escu[0]->pago== "pago") {?>
                                    <option value="pago" selected >Pago</option>


                        <?php }else{  ?>
                              <option value="pago">Pago</option>
                              <option value="espera"  selected>En  espera de pago</option>
                              <?php }}?>

                       

                  </select>


            </div>
            <div class="form-group col-lg-12">

                  <div class="row">
                        <div class="col-12 text-center p-5">
                              <h2>LOGO</h2>
                        </div>
                        <div class="col-12 text-center">
                              <img src="/files/<?php if (isset($escu)) {
                                                      echo $escu[0]->imagen;
                                                } ?>" alt="" height="400px" width="500px">
                        </div>

                  </div>


            </div>

            <div class="form-group col-lg-12">

                  <div class="row">
                        <div class="col-12 text-center p-5">
                              <h2>INTEGRANTES</h2>
                        </div>
                        <div class="col-3 text-center"><img src="/files/<?php if (isset($juagor1)) {
                                                                              echo $jugador1[0]->imagen;
                                                                        } ?>" alt="" height="230px" width="200px">
                              <p>{{$jugador1[0]->nombreReal}}</p>
                        </div>
                        <div class="col-3 text-center"><img src="/files/<?php if (isset($juagor2)) {
                                                                              echo $jugador2[0]->imagen;
                                                                        } ?>" alt="" height="230px" width="200px">
                              <p>{{$jugador2[0]->nombreReal}}</p>
                        </div>
                        <div class="col-3 text-center"><img src="/files/<?php if (isset($juagor3)) {
                                                                              echo $jugador3[0]->imagen;
                                                                        } ?>" alt="" height="230px" width="200px">
                              <p>{{$jugador3[0]->nombreReal}}</p>
                        </div>
                        <div class="col-3 text-center"><img src="/files/<?php if (isset($juagor4)) {
                                                                              echo $jugador4[0]->imagen;
                                                                        } ?>" alt="" height="230px" width="200px">
                              <p>{{$jugador4[0]->nombreReal}}</p>
                        </div>
                        <div class="col-3 text-center"><img src="/files/<?php if (isset($juagor5)) {
                                                                              echo $jugador5[0]->imagen;
                                                                        } ?>" alt="" height="230px" width="200px">
                              <p>{{$jugador5[0]->nombreReal}}</p>
                        </div>
                  </div>


            </div>







      </div>
      </div>

</form>

<Script>
      function guardar() {
            if ($("#form1").valid()) {
                  modificado = false;
                  form1.submit();
            } else {
                  $("#modalGuardar").modal('toggle');
                  msgShow("Corrija los errores e intente nuevamente.", "danger");
                  return false;
            }
      }
</Script>

</div>



@endsection