<!-- resources/views/mantenimientos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Mantenimientos</h1>
        <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Mantenimiento</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Mantenimiento</th>
                    <th>Dispositivo</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mantenimientos as $mantenimiento)
                    <tr>
                        <td>{{ $mantenimiento->id }}</td>
                        <td>{{ $mantenimiento->dispositivo->nombre }}</td>
                        <td>{{ $mantenimiento->descripcion }}</td>
                        <td>{{ $mantenimiento->fecha }}</td>
                        <td>
                            <a href="{{ route('mantenimientos.show', $mantenimiento->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}" method="POST" style="display:inline;">
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
