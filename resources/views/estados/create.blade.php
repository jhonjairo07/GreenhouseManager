@extends('layouts.app')

@section('title', 'Nuevo Estado de Cosecha')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Crear Nuevo Estado de Cosecha</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('estados.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Estado:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('estados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection