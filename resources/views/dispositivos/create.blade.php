<!-- resources/views/dispositivos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Dispositivo</h1>

        <form action="{{ route('dispositivos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('dispositivos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
