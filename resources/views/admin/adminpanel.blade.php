
@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<div class="container">
<h1>
    Servicios
    <br>

</h1>
      <p>
    Listado de servicios pendientes    
    </p>



</div>
@stop



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Servicios Pendientes</h3>
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
<!--BOTON ACEPTAR SERVICIO-->


        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-edit-confirm{{$item->id}}">Aceptar</a> 
         
        <div class="modal fade" id="modal-edit-confirm{{$item->id}}">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirme Info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        </div>
                    <div class="modal-body">
                        <form action = " {{route ('acept',$item->id)}}"method="POST">
                            @csrf
                        <div class="form-group">
                          <label for="usr">Nombre Animal</label>
                          <input type="text" class="form-control" id="usr" name="nombre" required value="{{$item->nombre}}">
                        </div>
                        <div class="form-group">
                          <label for="usr">Tipo</label>
                          <input type="text" class="form-control" id="usr" name="tipo" required value="{{$item->tipo}}">
                        </div>

                  
                        

                        <div class="form-group">
                          <label for="usr">Edad Animal</label>
                          <input type="text" class="form-control" id="usr" name="edad" required value="{{$item->edad}}">
                        </div>
                        <div class="form-group">
                          <label for="usr">Sexo</label>
                          <input type="text" class="form-control" id="usr" name="sexo" required value="{{$item->sexo}}">
                        </div>


                        

                        <div class="form-group">
                          <label for="comment">Descripcion del Problema o Sintomas</label>
                          <textarea class="form-control" rows="5" id="comment" name="descripcion" required value="{{$item->descripcion}}">{{$item->descripcion}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
                </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> 


<!--BOTON EDITAR-->

         <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-category{{$item->id}}">Editar</a> 
         
<div class="modal fade" id="modal-edit-category{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Dar de altas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
                <form action = " {{route ('edit',$item->id)}}"method="POST">
                    @method('PUT')
                    @csrf
                <div class="form-group">
                  <label for="usr">Nombre Animal</label>
                  <input type="text" class="form-control" id="usr" name="nombre" required value="{{$item->nombre}}">
                </div>

           <div class="form-group">
                  <label for="text">Tipo</label>
                  <select class="form-control" name="tipo" value="{{$item->tipo}}" required> 
                    <option selected value="" required>{{$item->tipo}}</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Ave">Ave</option>


                  </select>
                </div>

                <div class="form-group">
                  <label for="usr">Edad Animal</label>
                  <input type="text" class="form-control" id="usr" name="edad" required value="{{$item->edad}}">
                </div>


                <div class="form-group">
                  <label for="text">Sexo</label>
                  <select class="form-control" name="sexo" value="{{$item->sexo}}" required>
                    <option selected value="" required>{{$item->sexo}}</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="comment">Descripcion del Problema o Sintomas</label>
                  <textarea class="form-control" rows="5" id="comment" name="descripcion" required value="{{$item->descripcion}}">{{$item->descripcion}}</textarea>
                </div>



            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--BOTON METODO ELIMINAR-->


<!-- /.modal -->
          <form action="{{route ('cancelar',$item)}}" method="POST" class="d-inline formulario-eliminar">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm ">Rechazar</button>
              
          </form>




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




<!--TABLA PARA VER LOS SERVICIOS ACEPTADOS-->

<div class="container">
<h3>
    Servicios Aceptados     <br>

</h3>
      <p>
    Listado de servicios aceptados    
    </p>



</div>




<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Servicios Aceptados</h3>
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
     @foreach ($viewD as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->nombre }}</td>
      <td>{{ $item->tipo }}</td>
      <td>{{ $item->edad }}</td>
      <td>{{ $item->sexo }}</td>
      <td>{{ $item->descripcion }}</td>
      <td>

    <form action="{{route ('finalizado',$item)}}" method="POST" class="d-inline ">
            @method('DELETE')
            @csrf
            <button class="btn btn-primary btn-sm ">Finalizado</button>
              
          </form>




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
@stop

<!--SESCCION DE JS-->

@section('js')



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         
     

         @if ( session('confirmar') == 'ok')
        <script>
            Swal.fire(
              'Cita Aceptada!',
              'Cita Pendiente Lista',
              'success'
            )
        </script>
           
        @endif
        @if ( session('finalizado') == 'ok')
        <script>
            Swal.fire(
              'Finalizado!',
              'Cita Ha Terminado Con Éxito',
              'success'
            )
        </script>
           
        @endif

        @if ( session('edit') == 'ok')
        <script>
            Swal.fire(
              'Cita Edita!',
              'Cita Editada Con Éxito',
              'success'
            )
        </script>
           
        @endif



        @if ( session('eliminar') == 'ok')
        <script>
            Swal.fire(
              'Cita Cancelada!',
              'Su cita fue cancelada con exito',
              'success'
            )
        </script>
           
        @endif
        @if ( session('guardar') == 'ok')
        <script>
            Swal.fire(
              'Registro Exitoso!',
              'Su mascota fue agregadad con exito',
              'success'
            )
        </script>
           
        @endif


    <script>
        $('.formulario-eliminar').submit(function(e){
            //Prevenir el envio de formulario
            e.preventDefault();
            Swal.fire({
              title: 'Esta seguro de rechazar su cita',
              text: "Perdera la infromacion de la cita",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
              }
            })

        });
    </script>
@stop


