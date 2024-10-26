<!-- resources/views/envios/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Nuevo Envío</h1>

        <form action="{{ route('envios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" id="destino" name="destino" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('envios.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
