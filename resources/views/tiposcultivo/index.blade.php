@extends('layouts.app')

@section('title', 'Tipos de Cultivo')

@section('content')
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4>Listado de Tipos de Cultivo</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('tiposcultivo.create') }}" class="btn btn-success mb-3">Nuevo Tipo de Cultivo</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciclo (días)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tiposcultivo as $tipo)
                    <tr>
                        <td>{{ $tipo->id }}</td>
                        <td>{{ $tipo->nombre }}</td>
                        <td>{{ $tipo->ciclo_dias }}</td>
                        <td>
                            <a href="{{ route('tiposcultivo.edit', $tipo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('tiposcultivo.destroy', $tipo->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar este tipo de cultivo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay tipos de cultivo registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection