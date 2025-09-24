@extends('layouts.app')

@section('title', 'Listado de Invernaderos')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Invernaderos</h4>
        <a href="{{ route('invernaderos.create') }}" class="btn btn-light">Nuevo Invernadero</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tamaño (m²)</th>
                    <th>Finca</th>
                    <th>Costo Construcción</th>
                    <th>Rendimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invernaderos as $invernadero)
                <tr>
                    <td>{{ $invernadero->nombre }}</td>
                    <td>{{ $invernadero->tamano }}</td>
                    <td>{{ $invernadero->finca->nombre }}</td>
                    <td>{{ $invernadero->costoConstruccion }}</td>
                    <td>{{ $invernadero->rendimiento }}</td>
                    <td>
                        <a href="{{ route('invernaderos.edit', $invernadero->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('invernaderos.destroy', $invernadero->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar invernadero?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
