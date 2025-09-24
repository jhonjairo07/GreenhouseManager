@extends('layouts.app')

@section('title', 'Editar Estado de Cosecha')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h4>Editar Estado de Cosecha</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('estados.update', $estado->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Estado:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $estado->nombre }}" required>
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('estados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection