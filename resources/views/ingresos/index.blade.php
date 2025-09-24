@extends('layouts.app')

@section('title', 'Listado de Ingresos')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4>Ingresos</h4>
        <a href="{{ route('ingresos.create') }}" class="btn btn-light">Nuevo Ingreso</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Cosecha</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Cantidad Vendida</th>
                    <th>Precio unitario</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ingresos as $ingreso)
                <tr>
                    <td>{{ $ingreso->cosecha->id }}</td>
                    <td>{{ $ingreso->fecha }}</td>
                    <td>{{ $ingreso->descripcion }}</td>
                    <td>{{ $ingreso->cantidad_vendida }}</td>
                    <td>{{ $ingreso->precio_unitario }}</td>
                    <td>
                        <a href="{{ route('ingresos.edit', $ingreso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('ingresos.destroy', $ingreso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar ingreso?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay ingresos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
