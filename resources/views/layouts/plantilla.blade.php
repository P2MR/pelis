<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CinePedrete')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    
    @include('nav')
    
    <div class="container mt-4">
        @yield('content') <!-- Aquí se mostrará el contenido que nos ha facilitado la API -->
    </div>

    <footer class="text-center py-3 mt-5 bg-secondary">
        <p class="mb-0">🎬 CinePedrete - Tu sitio de películas</p>
    </footer>
</body>
</html>
