<!-- resources/views/pqrs/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de PQRS</h1>
        <a href="{{ route('pqrs.create') }}" class="btn btn-primary mb-3">Crear Nueva PQRS</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pqrs as $pqr)
                    <tr>
                        <td>{{ $pqr->id }}</td>
                        <td>{{ $pqr->tipo }}</td>
                        <td>{{ Str::limit($pqr->descripcion, 50) }}</td>
                        <td>
                            <a href="{{ route('pqrs.show', $pqr->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('pqrs.edit', $pqr->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('pqrs.destroy', $pqr->id) }}" method="POST" style="display:inline;">
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
