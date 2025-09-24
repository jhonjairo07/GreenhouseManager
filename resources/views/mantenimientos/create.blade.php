@extends('layouts.app')

@section('title', 'Registrar Mantenimiento')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Nuevo Mantenimiento</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('mantenimientos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="invernadero_id" class="form-label">Invernadero</label>
                <select name="invernadero_id" id="invernadero_id" class="form-select" required>
                    <option value="">-- Seleccione un invernadero --</option>
                    @foreach($invernaderos as $inv)
                        <option value="{{ $inv->id }}">{{ $inv->nombre }}</option>
                    @endforeach
                </select>
                @error('invernadero_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="fechaMantenimiento" class="form-label">Fecha de Mantenimiento</label>
                <input type="date" name="fechaMantenimiento" id="fechaMantenimiento" class="form-control" required>
                @error('fechaMantenimiento') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="costoMantenimiento" class="form-label">Costo Mantenimiento ($)</label>
                <input type="number" step="0.01" name="costoMantenimiento" id="costoMantenimiento" class="form-control" required>
                @error('costoMantenimiento') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4"></textarea>
                @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection