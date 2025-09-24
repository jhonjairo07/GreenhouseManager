<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Sistema Agrícola - Panel Principal')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center"> Sistema de Gestión Agrícola</h1>
    <div class="row g-4">
        
        <!-- Fincas -->
        <div class="col-md-3">
            <a href="{{ route('fincas.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Fincas</h5>
                        <p class="card-text">Administra tus fincas</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Invernaderos -->
        <div class="col-md-3">
            <a href="{{ route('invernaderos.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Invernaderos</h5>
                        <p class="card-text">Gestiona tus invernaderos</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Cosechas -->
        <div class="col-md-3">
            <a href="{{ route('cosechas.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Cosechas</h5>
                        <p class="card-text">Control de siembras y cosechas</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Ingresos -->
        <div class="col-md-3">
            <a href="{{ route('ingresos.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Ingresos</h5>
                        <p class="card-text">Registra tus ventas</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Gastos -->
        <div class="col-md-3">
            <a href="{{ route('gastos.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Gastos</h5>
                        <p class="card-text">Control de gastos de producción</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Categorías de Gastos -->
        <div class="col-md-3">
            <a href="{{ route('categorias.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Categorías de Gastos</h5>
                        <p class="card-text">Clasificación de egresos</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tipos de Cultivo -->
        <div class="col-md-3">
            <a href="{{ route('tiposcultivo.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tipos de Cultivo</h5>
                        <p class="card-text">Administra cultivos</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Estados de Cosecha -->
        <div class="col-md-3">
            <a href="{{ route('estados.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Estados de Cosecha</h5>
                        <p class="card-text">Monitorea avances</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Mantenimientos -->
        <div class="col-md-3">
            <a href="{{ route('mantenimientos.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Mantenimientos</h5>
                        <p class="card-text">Gestión de reparaciones</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection

</body>
</html>