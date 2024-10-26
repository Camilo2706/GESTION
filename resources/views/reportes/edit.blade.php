@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reporte</h1>
    <form action="{{ route('reportes.update', $reporte->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tipo">Tipo de Reporte</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $reporte->tipo }}" required>
        </div>
        <div class="form-group">
            <label for="detalles">Detalles</label>
            <textarea class="form-control" id="detalles" name="detalles" required>{{ $reporte->detalles }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
