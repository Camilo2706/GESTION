@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reporte</h1>
    <form action="{{ route('reportes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo de Reporte</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required>
        </div>
        <div class="form-group">
            <label for="detalles">Detalles</label>
            <textarea class="form-control" id="detalles" name="detalles" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
