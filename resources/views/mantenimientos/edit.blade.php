@extends('layouts.app')

@section('title', 'Editar Mantenimiento')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-dark">
        <h4>Editar Mantenimiento</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('mantenimientos.update', $mantenimiento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="idinvernadero" class="form-label">Invernadero</label>
                <select name="idinvernadero" id="idinvernadero" class="form-select" required>
                    @foreach($invernaderos as $inv)
                        <option value="{{ $inv->id }}" {{ $inv->id == $mantenimiento->idinvernadero ? 'selected' : '' }}>
                            {{ $inv->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('idinvernadero') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="fechaMantenimiento" class="form-label">Fecha de Mantenimiento</label>
                <input type="date" name="fechaMantenimiento" id="fechaMantenimiento" class="form-control" value="{{ $mantenimiento->fechaMantenimiento }}" required>
                @error('fechaMantenimiento') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="costoMantenimiento" class="form-label">Costo Mantenimiento ($)</label>
                <input type="number" step="0.01" name="costoMantenimiento" id="costoMantenimiento" class="form-control" value="{{ $mantenimiento->costoMantenimiento }}" required>
                @error('costoMantenimiento') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción</label>
                <textarea name="Descripcion" id="Descripcion" class="form-control" rows="4">{{ $mantenimiento->Descripcion }}</textarea>
                @error('Descripcion') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection