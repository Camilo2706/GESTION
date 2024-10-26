<!-- resources/views/mantenimientos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Mantenimiento</h1>

        <form action="{{ route('mantenimientos.update', $mantenimiento->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="dispositivo_id">Dispositivo:</label>
                <select class="form-control" id="dispositivo_id" name="dispositivo_id" required>
                    @foreach($dispositivos as $dispositivo)
                        <option value="{{ $dispositivo->id }}" {{ $mantenimiento->dispositivo_id == $dispositivo->id ? 'selected' : '' }}>
                            {{ $dispositivo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $mantenimiento->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $mantenimiento->fecha }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
