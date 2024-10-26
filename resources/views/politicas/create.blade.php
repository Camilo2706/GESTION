<!-- resources/views/politicas/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Política</h1>

        <form action="{{ route('politicas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('politicas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
