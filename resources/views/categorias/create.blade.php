@extends('layouts.app')

@section('title', 'Nueva Categoría')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Crear Nueva Categoría</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Categoría:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
