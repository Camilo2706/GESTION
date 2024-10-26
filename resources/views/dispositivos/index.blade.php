<!-- resources/views/dispositivos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Dispositivos</h1>
        <a href="{{ route('dispositivos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Dispositivo</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dispositivos as $dispositivo)
                    <tr>
                        <td>{{ $dispositivo->id }}</td>
                        <td>{{ $dispositivo->nombre }}</td>
                        <td>{{ $dispositivo->marca }}</td>
                        <td>{{ $dispositivo->modelo }}</td>
                        <td>
                            <a href="{{ route('dispositivos.edit', $dispositivo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('dispositivos.destroy', $dispositivo->id) }}" method="POST" style="display:inline;">
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
