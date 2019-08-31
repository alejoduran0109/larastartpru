@extends('adminlte::page')

@section('content')
    <h3 class="text-center mb-3 pt-3">Editar la nota {{$personActualizar->id}}</h3>

    <form action="{{route('update' , $personActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <input type="text" name="identificacion" id="identificacion" value="{{$personActualizar->identificacion}}" class="form-control">
        </div>

        <div class="form-group">
            <input type="text" name="nombres" id="nombres" value="{{$personActualizar->nombres}}" class="form-control">
        </div>

        <div class="form-group">
            <input type="text" name="apellidos" id="apellidos" value="{{$personActualizar->apellidos}}" class="form-control">
        </div>

        <button type="submit" class="btn btn-warning btn-block">Editar nota</button>
    </form>
    @if (session('update'))
        <div class="alert alert-success mt-3">
            {{session('update')}}
        </div>
    @endif
@endsection