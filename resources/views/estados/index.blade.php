@extends('layouts.app')

@section('title', 'Estados de Cosecha')

@section('content')
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4>Listado de Estados de Cosecha</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('estados.create') }}" class="btn btn-success mb-3">Nuevo Estado</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($estados as $estado)
                    <tr>
                        <td>{{ $estado->id }}</td>
                        <td>{{ $estado->nombre }}</td>
                        <td>
                            <a href="{{ route('estados.edit', $estado->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('estados.destroy', $estado->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar este estado?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay estados registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection