@extends('layouts.app')

@section('title', 'Listado de Fincas')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4>Fincas</h4>
        <a href="{{ route('fincas.create') }}" class="btn btn-light">Nueva Finca</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fincas as $finca)
                <tr>
                    <td>{{ $finca->nombre }}</td>
                    <td>{{ $finca->ubicacion }}</td>
                    <td>
                        <a href="{{ route('fincas.edit', $finca->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('fincas.destroy', $finca->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar finca?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
