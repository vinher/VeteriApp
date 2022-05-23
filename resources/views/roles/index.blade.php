
@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<div class="container">
<h1>
    Mascotas
    <br>

</h1>
      <p>
     Bienvenido en este apartado podra dar de alta sus mascotas para que puedan ser    
    </p>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Dar de alta 
    </button>

</div>
@stop

@if ( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif

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
      <th scope="col">ID</th>
      <th scope="col">Nombre Animal</th>
      <th scope="col">Tipo De Animal</th>
      <th scope="col">Edad</th>
      <th scope="col">Sexo</th>
      <th scope="col">Descripcion de Sintomas</th>
      <th scope="col">Acciones</th>


    </tr>
  </thead>
  <tbody>
     @foreach ($viewDate as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->nombre }}</td>
      <td>{{ $item->tipo }}</td>
      <td>{{ $item->edad }}</td>
      <td>{{ $item->sexo }}</td>
      <td>{{ $item->descripcion }}</td>
      <td>
          <a href="" class="btn btn-primary btn-sm">Enviar</a>
                    <a href="" class="btn btn-danger btn-sm">Cancelar</a>
      </td>

    </tr>
    @endforeach

      
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
                <h4 class="modal-title">Dar de altas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
                <form action = " {{route ('save')}}"method="POST">
                    @csrf
                <div class="form-group">
                  <label for="usr">Nombre Animal</label>
                  <input type="text" class="form-control" id="usr" name="nombre" required>
                </div>

           <div class="form-group">
                  <label for="text">Tipo</label>
                  <select class="form-control" name="tipo" value="" required> 
                    <option selected value="" required>Opciones</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Ave">Ave</option>


                  </select>
                </div>

                <div class="form-group">
                  <label for="usr">Edad Animal</label>
                  <input type="text" class="form-control" id="usr" name="edad" required>
                </div>


                <div class="form-group">
                  <label for="text">Sexo</label>
                  <select class="form-control" name="sexo" value="" required>
                    <option selected value="" required>Opciones</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="comment">Descripcion del Problema o Sintomas</label>
                  <textarea class="form-control" rows="5" id="comment" name="descripcion" required></textarea>
                </div>



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Dar de alta</button>
            </div>
        </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('js')

@stop


