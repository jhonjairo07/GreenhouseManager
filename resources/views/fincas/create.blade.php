@extends('layouts.app')

@section('title', 'Crear Finca')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Nueva Finca</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('fincas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('fincas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
