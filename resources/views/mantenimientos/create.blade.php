<!-- resources/views/mantenimientos/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Mantenimiento</h1>

        <form action="{{ route('mantenimientos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dispositivo_id">Dispositivo:</label>
                <select class="form-control" id="dispositivo_id" name="dispositivo_id" required>
                    @foreach($dispositivos as $dispositivo)
                        <option value="{{ $dispositivo->id }}">{{ $dispositivo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
