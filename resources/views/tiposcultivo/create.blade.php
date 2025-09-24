@extends('layouts.app')

@section('title', 'Nuevo Tipo de Cultivo')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Crear Nuevo Tipo de Cultivo</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('tiposcultivo.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ciclo_dias" class="form-label">Ciclo (días):</label>
                <input type="number" name="ciclo_dias" id="ciclo_dias" class="form-control" required>
                @error('ciclo_dias')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('tiposcultivo.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection