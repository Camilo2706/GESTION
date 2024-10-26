<!-- resources/views/envios/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Envíos</h1>
        <a href="{{ route('envios.create') }}" class="btn btn-primary mb-3">Registrar Nuevo Envío</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Destino</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($envios as $envio)
                    <tr>
                        <td>{{ $envio->id }}</td>
                        <td>{{ $envio->fecha }}</td>
                        <td>{{ $envio->destino }}</td>
                        <td>{{ $envio->estado }}</td>
                        <td>
                            <a href="{{ route('envios.edit', $envio->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('envios.destroy', $envio->id) }}" method="POST" style="display:inline;">
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
