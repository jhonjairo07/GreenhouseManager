@extends('layouts.app')

@section('title', 'Registrar Gasto')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Registrar Gasto</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('gastos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="cosechas_id" class="form-label">Cosecha:</label>
                <select name="cosechas_id" id="cosechas_id" class="form-select" required>
                    @foreach($cosechas as $cosecha)
                        <option value="{{ $cosecha->id }}">{{ $cosecha->id }} - {{ $cosecha->notas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="categorias_gastos_id" class="form-label">Categoría:</label>
                <select name="categorias_gastos_id" id="categorias_gastos_id" class="form-select" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="monto" class="form-label">Monto:</label>
                <input type="number" step="0.01" name="monto" id="monto" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('gastos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
