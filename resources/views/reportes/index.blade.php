@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Reportes</h1>
    <a href="{{ route('reportes.create') }}" class="btn btn-primary">Crear Reporte</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportes as $reporte)
            <tr>
                <td>{{ $reporte->id }}</td>
                <td>{{ $reporte->fecha }}</td>
                <td>{{ $reporte->tipo }}</td>
                <td>{{ $reporte->estado }}</td>
                <td>
                    <a href="{{ route('reportes.edit', $reporte->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST" style="display:inline;">
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
