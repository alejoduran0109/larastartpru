@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresar Recursos</h3>
                </div>
                @if (session('message'))
                <div class="alert alert-error mt-3">
                    {{session('message')}}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{session('success')}}
                </div>
            @endif
            
                @if($errors->all())
                <div class="alert alert-error" role="alert">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('store')}}" method="POST">
                    @csrf

                    <div class="box-body">
                    <div class=col-md-6>
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Ingresar Categoria" required>
                        </div>
                        </div>
                        <div class=col-md-6>
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Ingresar Codigo" required>
                        </div>
                        </div>
                        <div class=col-md-6>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre recurso">
                        </div>
                        </div>
                        <div class=col-md-6>
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingresar Marca">
                        </div>
                        </div>
                        <div class=col-md-12>
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control" id="serie" name="serie" placeholder="Ingresar Serie producto">
                        </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado Recursos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="display:none">ID</th>
                                    <th>Categoria</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Serie</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($datos as $item)
                            <tr>
                                    <td style="display:none">{{$item->id}}</td>
                                    <td>{{$item->categoria}}</td>
                                    <td>{{$item->codigo}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->marca}}</td>
                                    <td>{{$item->serie}}</td>
                                    <td>
                            <a href="{{route('editar' , $item->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('eliminar' , $item->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" href="{{$item->id}}" class="btn btn-danger">Eliminar</button>
                            </form>
                            <button type="submit" data-toggle="modal" data-target="#modal-default{{$item->id}}" onclick="{{$item->id}}" class="btn btn-primary">Asignar</button>                        </td>
                                </tr>
                                <div class="modal fade" id="modal-default{{$item->id}}">
                                    <script>

                                    </script>
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Asignar Recurso</h4>
                                            </div>
                                            <form action="{{route('asignar')}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="id_recurso" id="id_recurso" value="{{ $item->id }}" required>

                                                    <div class="form-group">
                                                        <label for="recurso">Recurso</label>
                                                        <input type="text" readonly="readonly" value="{{ $item->nombre }}" class="form-control" name="recurso" id="recurso" placeholder="Ingresar Categoria" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Persona</label>
                                                        <select class="form-control select2" name="selectPerson" id="selectPerson" style="width: 100%;">
                                                            @foreach ($personas as $person)
                                                            <option value="{{ $person->id }}">{{$person->nombres}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                @endforeach


                                </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="modal-default" >
    
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Asignar Recurso</h4>
              </div>
              <form action="{{route('asignar')}}" method="POST">
              @csrf 
              <div class="modal-body">
              <input type="hidden" class="form-control" name="id_recurso" id="id_recurso" value="{{ $item->id }}" required>

              <div class="form-group">
                            <label for="recurso">Recurso</label>
                            <input type="text"  readonly="readonly" value="{{ $item->nombre }}" class="form-control" name="recurso" id="recurso" placeholder="Ingresar Categoria" required>
                        </div>

                        <div class="form-group">
                             <label>Persona</label>
                <select class="form-control select2"  name="selectPerson" id="selectPerson" style="width: 100%;">
                @foreach ($personas as $person)
                  <option value="{{ $person->id }}" >{{$person->nombres}}</option>
                  @endforeach
                </select>
                        </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

@endsection
@section('js')


<script>
     //Initialize Select2 Elements
     $('.select2').select2()
     
    $(function() {
        $('#example1').DataTable( {
    language: {
        "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    }
} );
    })
</script>

<script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

@endsection
@section('css')
<link rel="stylesheet" href="css/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/select2/dist/css/select2.min.css">
@stop
