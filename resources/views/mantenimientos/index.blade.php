@extends('layouts.app')

@section('title', 'Listado de Mantenimientos')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4>Mantenimientos</h4>
        <a href="{{ route('mantenimientos.create') }}" class="btn btn-light">Nuevo Mantenimiento</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Invernadero</th>
                    <th>Fecha</th>
                    <th>Costo</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mantenimientos as $mantenimiento)
                    <tr>
                        <td>{{ $mantenimiento->id }}</td>
                        <td>{{ optional($mantenimiento->invernadero)->nombre ?? '—' }}</td>
                        <td>{{ $mantenimiento->fechaMantenimiento }}</td>
                        <td>${{ ($mantenimiento->costoMantenimiento) }}</td>
                        <td>{{ $mantenimiento->descripcion }}</td>
                        <td>
                            <a href="{{ route('mantenimientos.edit', $mantenimiento->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('mantenimientos.destroy', $mantenimiento->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este mantenimiento?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay mantenimientos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection