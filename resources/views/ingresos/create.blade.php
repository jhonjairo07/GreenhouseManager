@extends('layouts.app')

@section('title', 'Registrar Ingreso')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Nuevo Ingreso</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('ingresos.store') }}" method="POST">
            @csrf

            {{-- Cosecha --}}
            <div class="mb-3">
                <label for="cosechas_id" class="form-label">Cosecha</label>
                <select name="cosechas_id" id="cosechas_id" class="form-select" required>
                    <option value="">-- Seleccione una cosecha --</option>
                    @foreach($cosechas as $cosecha)
                        <option value="{{ $cosecha->id }}">Cosecha #{{ $cosecha->id }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Fecha --}}
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            {{-- Descripción --}}
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
            </div>

            {{-- Cantidad Vendida --}}
            <div class="mb-3">
                <label for="cantidad_vendida" class="form-label">Cantidad Vendida</label>
                <input type="number" step="0.01" name="cantidad_vendida" id="cantidad_vendida" class="form-control" required>
            </div>

            {{-- Precio Unitario --}}
            <div class="mb-3">
                <label for="precio_unitario" class="form-label">Precio Unitario ($)</label>
                <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="form-control" required>
            </div>

            

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('ingresos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
