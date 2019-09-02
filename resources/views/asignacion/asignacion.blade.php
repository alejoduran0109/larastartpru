@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresar Recursos Multiple</h3>
                </div>
               
                @if (session('message'))
                <div class="alert alert-success mt-3">
                    {{session('message')}}
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
                        <div class="form-group">
                            <label>Persona</label>
                            <select class="form-control select2"  data-placeholder="Select a State"  style="width: 100%;">
                              
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombres">Recursos</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"  style="width: 100%;">
                              
                                    <option value=""></option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Persona a Asignar</label>
                            <select class="form-control select2"  data-placeholder="Select a State"  style="width: 100%;">
                              
                                    <option value=""></option>
                                </select>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado Personas con recursos asginados</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Recurso</th>
                                    <th>Asignado a</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($datos as $item)
                                    <tr>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->nombrePer}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                    <form action="{{route('eliminar' , $item->id)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger "><i class="fas fa-fw fa-close "></i>Eliminar</button>
                                    </form>
                                </td>
                                        </tr>
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

@endsection
@section('js')
<script>
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
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop