@extends('layouts.app')

@section('title', 'Listado de Gastos')

@section('content')
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4>Listado de Gastos</h4>
    </div>
    <div class="card-body">
        <a href="{{ route('gastos.create') }}" class="btn btn-success mb-3">Nuevo Gasto</a>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Cosecha</th>
                    <th>Categoría</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gastos as $gasto)
                    <tr>
                        <td>{{ $gasto->id }}</td>
                        <td>{{ $gasto->cosecha->id ?? 'N/A' }}</td>
                        <td>{{ $gasto->categoria->nombre ?? 'N/A' }}</td>
                        <td>{{ $gasto->fecha }}</td>
                        <td>{{ $gasto->descripcion }}</td>
                        <td>${{ number_format($gasto->monto, 2) }}</td>
                        <td>
                            <a href="{{ route('gastos.edit', $gasto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('gastos.destroy', $gasto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar este gasto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
