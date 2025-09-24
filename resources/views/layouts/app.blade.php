<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Agrícola')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">🌱 Sistema Agrícola</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('fincas.index') }}">Fincas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('invernaderos.index') }}">Invernaderos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cosechas.index') }}">Cosechas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ingresos.index') }}">Ingresos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('gastos.index') }}">Gastos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tiposcultivo.index') }}">Tipos Cultivo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('estados.index') }}">Estados</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('mantenimientos.index') }}">Mantenimientos</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido específico de cada vista -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
