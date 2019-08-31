@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresar Persona</h3>
                </div>

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
                            <label for="identificacion">Identificacion</label>
                            <input type="text" class="form-control" name="identificacion" id="identificacion" placeholder="Ingresar identificacion" required>
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingresar Nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="apellidos" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresar Apellidos">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado Personas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Identificacion</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($datos as $item)
                            <tr>
                                    <td>{{$item->identificacion}}</td>
                                    <td>{{$item->nombres}}
                                        
                                    </td>
                                    <td>{{$item->apellidos}}</td>
                                    <td>
                            <a href="{{route('editar' , $item->id)}}" class="btn btn-warning">Editar</a>
                            <form action="{{route('eliminar' , $item->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
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
    $(function() {
        $('#example1').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>

<script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

@endsection
@section('css')
<link rel="stylesheet" href="css/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop