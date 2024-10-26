<!-- resources/views/licencias/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Licencias</h1>
        <a href="{{ route('licencias.create') }}" class="btn btn-primary mb-3">Crear Nueva Licencia</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Licencia</th>
                    <th>Dispositivo</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Expiración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($licencias as $licencia)
                    <tr>
                        <td>{{ $licencia->id }}</td>
                        <td>{{ $licencia->dispositivo->nombre }}</td>
                        <td>{{ $licencia->fecha_inicio }}</td>
                        <td>{{ $licencia->fecha_expiracion }}</td>
                        <td>
                            <a href="{{ route('licencias.show', $licencia->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('licencias.edit', $licencia->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('licencias.destroy', $licencia->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
