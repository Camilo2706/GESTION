<!-- resources/views/licencias/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Licencia</h1>

        <form action="{{ route('licencias.store') }}" method="POST">
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
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label for="fecha_expiracion">Fecha de Expiración:</label>
                <input type="date" class="form-control" id="fecha_expiracion" name="fecha_expiracion" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('licencias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
