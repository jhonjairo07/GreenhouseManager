@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h4>Editar Categoría</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Categoría:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
