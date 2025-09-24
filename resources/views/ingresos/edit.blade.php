@extends('layouts.app')

@section('title', 'Editar Ingreso')

@section('content')
    <div class="card">
        <div class="card-header bg-warning">
            <h4>Editar Ingreso</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('ingresos.update', $ingreso->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Cosecha --}}
                <div class="mb-3">
                    <label for="cosechas_id" class="form-label">Cosecha</label>
                    <select name="cosechas_id" id="cosechas_id" class="form-select" required>
                        @foreach ($cosechas as $cosecha)
                            <option value="{{ $cosecha->id }}"
                                {{ $cosecha->id == $ingreso->cosecha_id ? 'selected' : '' }}>
                                Cosecha #{{ $cosecha->id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Fecha --}}
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $ingreso->fecha }}"
                        required>
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ $ingreso->descripcion }}</textarea>
                </div>

                {{-- Cantidad Vendida --}}
                <div class="mb-3">
                    <label for="cantidad_vendida" class="form-label">Cantidad Vendida</label>
                    <input type="number" step="0.01" name="cantidad_vendida" id="cantidad_vendida" class="form-control"
                        value="{{ $ingreso->cantidad_vendida }}" required>
                </div>

                {{-- Precio Unitario --}}
                <div class="mb-3">
                    <label for="precio_unitario" class="form-label">Precio Unitario ($)</label>
                    <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="form-control"
                        value="{{ $ingreso->precio_unitario }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('ingresos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
