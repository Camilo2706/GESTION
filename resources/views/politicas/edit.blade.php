<!-- resources/views/politicas/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Política</h1>

        <form action="{{ route('politicas.update', $politica->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $politica->titulo }}" required>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="5" required>{{ $politica->contenido }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('politicas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
