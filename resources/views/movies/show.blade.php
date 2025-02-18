<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Película</title>
</head>
<body>
    @include('nav')
    <h1>{{ $movie['title'] }}</h1>
    <p>{{ $movie['overview'] }}</p>
    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" width="300">
    <p><strong>Fecha de estreno:</strong> {{ $movie['release_date'] }}</p>
    <p><strong>Calificación:</strong> {{ $movie['vote_average'] }}</p>
</body>
</html>
