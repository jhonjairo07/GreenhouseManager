@extends('layouts.app')

@section('title', 'Editar Invernadero')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h4>Editar Invernadero</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('invernaderos.update', $invernadero->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $invernadero->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="tamano" class="form-label">Tamaño (m²)</label>
                <input type="number" step="0.01" name="tamano" class="form-control" value="{{ $invernadero->tamano }}" required>
            </div>
            <div class="mb-3">
                <label for="finca_id" class="form-label">Finca</label>
                <select name="finca_id" class="form-select" required>
                    @foreach($fincas as $finca)
                        <option value="{{ $finca->id }}" {{ $finca->id == $invernadero->finca_id ? 'selected' : '' }}>
                            {{ $finca->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="costoConstruccion" class="form-label">Costo Construcción</label>
                <input type="number" step="0.01" name="costoConstruccion" class="form-control" value="{{ $invernadero->costoConstruccion }}" required>
            </div>
            <div class="mb-3">
                <label for="rendimiento" class="form-label">Rendimiento</label>
                <input type="number" step="0.01" name="rendimiento" class="form-control" value="{{ $invernadero->rendimiento }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('invernaderos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
