<!-- resources/views/politicas/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Políticas</h1>
        <a href="{{ route('politicas.create') }}" class="btn btn-primary mb-3">Crear Nueva Política</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($politicas as $politica)
                    <tr>
                        <td>{{ $politica->id }}</td>
                        <td>{{ $politica->titulo }}</td>
                        <td>{{ Str::limit($politica->contenido, 50) }}</td>
                        <td>
                            <a href="{{ route('politicas.show', $politica->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('politicas.edit', $politica->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('politicas.destroy', $politica->id) }}" method="POST" style="display:inline;">
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
