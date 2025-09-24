@extends('layouts.app')

@section('title', 'Editar Cosecha')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h4>Editar Cosecha</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('cosechas.update', $cosecha->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Invernadero --}}
            <div class="mb-3">
                <label for="invernadero_id" class="form-label">Invernadero</label>
                <select name="invernadero_id" id="invernadero_id" class="form-select" required>
                    @foreach($invernaderos as $invernadero)
                        <option value="{{ $invernadero->id }}" {{ $invernadero->id == $cosecha->invernadero_id ? 'selected' : '' }}>
                            {{ $invernadero->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Cultivo --}}
            <div class="mb-3">
                <label for="cultivo_id" class="form-label">Cultivo</label>
                <select name="cultivo_id" id="cultivo_id" class="form-select" required>
                    @foreach($cultivos as $cultivo)
                        <option value="{{ $cultivo->id }}" {{ $cultivo->id == $cosecha->cultivo_id ? 'selected' : '' }}>
                            {{ $cultivo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Estado --}}
            <div class="mb-3">
                <label for="id_estado" class="form-label">Estado</label>
                <select name="id_estado" id="id_estado" class="form-select" required>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $estado->id == $cosecha->id_estado ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Fechas --}}
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="fecha_creacion" class="form-label">Fecha Creación</label>
                    <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" value="{{ $cosecha->fecha_creacion }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fecha_siembra" class="form-label">Fecha Siembra</label>
                    <input type="date" name="fecha_siembra" id="fecha_siembra" class="form-control" value="{{ $cosecha->fecha_siembra }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fecha_cosecha_estimada" class="form-label">Fecha Estimada</label>
                    <input type="date" name="fecha_cosecha_estimada" id="fecha_cosecha_estimada" class="form-control" value="{{ $cosecha->fecha_cosecha_estimada }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fecha_cosecha_real" class="form-label">Fecha Real</label>
                    <input type="date" name="fecha_cosecha_real" id="fecha_cosecha_real" class="form-control" value="{{ $cosecha->fecha_cosecha_real }}">
                </div>
            </div>

            {{-- Cantidad sembrada --}}
            <div class="mb-3">
                <label for="cantidad_sembrada" class="form-label">Cantidad Sembrada</label>
                <input type="number" step="0.01" name="cantidad_sembrada" id="cantidad_sembrada" class="form-control" value="{{ $cosecha->cantidad_sembrada }}" required>
            </div>

            {{-- Totales --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="total_gastos" class="form-label">Total Gastos</label>
                    <input type="number" step="0.01" name="total_gastos" id="total_gastos" class="form-control" value="{{ $cosecha->total_gastos }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="total_ingresos" class="form-label">Total Ingresos</label>
                    <input type="number" step="0.01" name="total_ingresos" id="total_ingresos" class="form-control" value="{{ $cosecha->total_ingresos }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="utilidad" class="form-label">Utilidad</label>
                    <input type="number" step="0.01" name="utilidad" id="utilidad" class="form-control" value="{{ $cosecha->utilidad }}">
                </div>
            </div>

            {{-- Notas --}}
            <div class="mb-3">
                <label for="notas" class="form-label">Notas</label>
                <textarea name="notas" id="notas" class="form-control" rows="3">{{ $cosecha->notas }}</textarea>
            </div>

            {{-- Botones --}}
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('cosechas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
