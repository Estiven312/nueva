@extends('plantilla')
@section('titulo', "Clasificación")
@section('scripts')
<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script>
      globalId = '<?php echo isset($usuario->idusuario) && $usuario->idusuario > 0 ? $usuario->idusuario : 0; ?>';
      <?php $globalId = isset($usuario->idusuario) ? $usuario->idusuario : "0"; ?>
</script>
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
      <li class="breadcrumb-item"><a href="/admin/usuarios">Noticia</a></li>

</ol>
<ol class="toolbar">
      <li class="btn-item"><a title="Nuevo" href="/admin/noticia" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
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
            <input type="hidden" id="id" name="id" class="form-control" value="<?php if (isset($cla)) {
                                                                                          echo $cla[0]->id;
                                                                                    } ?>" required>

            <div class="form-group col-lg-2">
                  <label>Kill:</label>
            </div>
            <div class="form-group col-lg-4">
                  <input type="text" name="numKill" class="form-control" value=" <?php if (isset($cla)) {
                                                                                                      echo $cla[0]->kills;
                                                                                                } ?>">
            </div>
            <div class="form-group col-lg-2">
                  <label>BOYAHS:</label>
            </div>
            <div class="form-group col-lg-4">
                  <input type="text" id="numBoyash" name="numBoyahs" class="form-control" value="<?php if (isset($cla)) {
                                                                                                            echo $cla[0]->boyahs;
                                                                                                      } ?>">
            </div>
            <div class="form-group col-lg-2">
                  <label>PUNTOS*</label>
            </div>
            <div class="form-group col-lg-4">

                  <input type="text" class="form-control" name="numPuntos" value="<?php if (isset($cla)) {
                                                                        echo $cla[0]->puntos;
                                                                  } ?>">
            </div>
            <div class="form-group col-lg-2 ">
                  <label>Escuadra</label>
            </div>
            <div class=" form-group col-lg-4 ">


                  <?php if (isset($cla)) { ?>

                        <input type="text" class="form-control" disabled value="<?php if (isset($cla)) {
                                                                        echo $cla[0]->nombre;
                                                                  } ?>">
                  <?php }else{?>
                  
                  <select name="lstEscuadra" id="" class="form-control">
                  <option value="">Selecione una escuadra</option>
                        @foreach($clas as $cla)
                        <option value="{{$cla->id}}">{{$cla->nombre}}</option>
                        @endforeach
                  </select>
                  <?php }?>
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