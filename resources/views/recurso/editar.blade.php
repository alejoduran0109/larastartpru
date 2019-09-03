@extends('adminlte::page')

@section('content')
    <h3 class="text-center mb-3 pt-3">Editar recurso: {{$recursoActualizar->id}}</h3>

    <form action="{{route('update' , $recursoActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
                <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" value="{{$recursoActualizar->categoria}}" class="form-control">
        </div>

        <div class="form-group">
                <label for="codigo">Codigo</label>
            <input type="text" name="codigo" id="codigo" value="{{$recursoActualizar->codigo}}" class="form-control">
        </div>

        <div class="form-group">
                <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{$recursoActualizar->nombre}}" class="form-control">
        </div>

        <div class="form-group">
                <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="{{$recursoActualizar->marca}}" class="form-control">
        </div>

        <div class="form-group">
                <label for="serie">Serie</label>
            <input type="text" name="serie" id="serie" value="{{$recursoActualizar->serie}}" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning btn-block">Editar recurso</button>
    </form>
    @if (session('update'))
        <div class="alert alert-success mt-3">
            {{session('update')}}
        </div>
    @endif
@endsection