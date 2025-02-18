@extends('layouts.plantilla')

@section('title', 'Películas')

@section('content')

    <!-- Barra de Búsqueda -->
    <div class="text-center mb-4">
        <form action="{{ url('/movies') }}" method="GET" class="d-inline-block w-50">
            <div class="input-group">
                <!-- Se mantiene el valor de la búsqueda -->
                <input type="text" name="search" class="form-control" placeholder="Buscar películas..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </form>
    </div>

    <h1 class="text-center text-uppercase mb-4"><i class="bi bi-film"></i> Películas</h1>

    <!-- Si movies no está vacío o count es mayor que 0, entonces se muestran los resultados de la API -->
    @if (isset($movies) && count($movies) > 0)
        <div class="row" id="movies-container">
            @foreach ($movies as $movie)
                <div class="col-md-4 col-lg-3">
                    <div class="card bg-secondary text-white mb-4">
                        @if (isset($movie['poster_path']))
                            <!-- Imagen de la película -->
                            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top"
                                alt="{{ $movie['title'] }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie['title'] }}</h5>
                            <p class="card-text">{{ Str::limit($movie['overview'], 50) }}</p>

                            <!-- Enlace para ver más detalles de la película -->
                            <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif(isset($searchTerm) && $searchTerm !== '')
        <!-- Si no se encuentran resultados para la búsqueda -->
        <p class="alert alert-warning">No se encontraron películas para "{{ $searchTerm }}"</p>
    @endif

@endsection
