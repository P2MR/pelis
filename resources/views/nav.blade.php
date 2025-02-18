<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="bi bi-film"></i> CinePedro
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Volver a la lista de películas</a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="{{ route('favoritos.index') }}">Favoritas</a>
                </li>-->
            </ul>
        </div>
    </div>
</nav>
