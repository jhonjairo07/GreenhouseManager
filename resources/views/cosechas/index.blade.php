@extends('layouts.app')

@section('title', 'Listado de Cosechas')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h4>Cosechas</h4>
        <a href="{{ route('cosechas.create') }}" class="btn btn-light">Nueva Cosecha</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Invernadero</th>
                    <th>Cultivo</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Siembra</th>
                    <th>Estimada</th>
                    <th>Real</th>
                    <th>Cant. Sembrada</th>
                    <th>Gastos</th>
                    <th>Ingresos</th>
                    <th>Utilidad</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cosechas as $cosecha)
                <tr>
                    <td>{{ $cosecha->id }}</td>
                    <td>{{ $cosecha->invernadero->nombre }}</td>
                    <td>{{ $cosecha->tipoCultivo->nombre }}</td>
                    <td>{{ $cosecha->estadoCosecha->nombre }}</td>
                    <td>{{ $cosecha->fecha_creacion }}</td>
                    <td>{{ $cosecha->fecha_siembra }}</td>
                    <td>{{ $cosecha->fecha_cosecha_estimada ?? '-' }}</td>
                    <td>{{ $cosecha->fecha_cosecha_real ?? '-' }}</td>
                    <td>{{ $cosecha->cantidad_sembrada }}</td>
                    <td>${{ number_format($cosecha->total_gastos, 2) }}</td>
                    <td>${{ number_format($cosecha->total_ingresos, 2) }}</td>
                    <td>${{ number_format($cosecha->utilidad, 2) }}</td>
                    <td>{{ $cosecha->notas }}</td>
                    <td>
                        <a href="{{ route('cosechas.edit', $cosecha->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cosechas.destroy', $cosecha->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar cosecha?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="14" class="text-center">No hay cosechas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
