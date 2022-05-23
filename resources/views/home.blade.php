
@extends('adminlte::page')

@section('title', 'Pagina Principal')

@section('content_header')
<div class="container">
<h1>
    Mascotas
    <br>

    


@can('')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Crear
    </button>


@endcan


</h1>

    <p>
     Bienvenido en este apartado podra dar de alta sus mascotas para que puedan ser atendidas   
    </p>
    

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Dar de alta mascota
    </button>

</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mascotas Dadas De Alta</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table class="table">
  <thead>
    <tr>
      <th scope="col">Num</th>
      <th scope="col">Nombre Animal</th>
      <th scope="col">Tipo De Animal</th>
      <th scope="col">Edad</th>
      <th scope="col">Sexo</th>
      <th scope="col">Descripcion de Sintomas</th>
      <th scope="col">Acciones</th>


    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Gato</td>
      <td>2</td>
      <td>Masculino</td>
      <td>Vomito</td>
      <td>
        <a href="" class="btn btn-sm btn-primary">Enviar</a>
        <a href="" class="btn btn-sm btn-danger">Cancelar</a>      
      </td>
    </tr>

  </tbody>
</table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
                <input type="" name="">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#categories').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop


