@extends('layouts.app')

@section('title', 'Editar Finca')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h4>Editar Finca</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('fincas.update', $finca->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $finca->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="{{ $finca->ubicacion }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('fincas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
