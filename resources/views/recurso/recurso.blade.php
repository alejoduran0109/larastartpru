@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresar Recursos</h3>
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
