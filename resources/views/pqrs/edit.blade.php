<!-- resources/views/pqrs/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar PQRS</h1>

        <form action="{{ route('pqrs.update', $pqr->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="Petición" {{ $pqr->tipo == 'Petición' ? 'selected' : '' }}>Petición</option>
                    <option value="Queja" {{ $pqr->tipo == 'Queja' ? 'selected' : '' }}>Queja</option>
                    <option value="Reclamo" {{ $pqr->tipo == 'Reclamo' ? 'selected' : '' }}>Reclamo</option>
                    <option value="Sugerencia" {{ $pqr->tipo == 'Sugerencia' ? 'selected' : '' }}>Sugerencia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required>{{ $pqr->descripcion }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pqrs.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
