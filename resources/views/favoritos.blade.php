@extends('layouts.plantilla')

@section('title', 'Favoritos')

@section('content')

<h1 class="text-center text-uppercase mb-4"><i class="bi bi-heart-fill text-danger"></i> Mis Favoritos</h1>

@if($favorites->isEmpty())
    <p class="alert alert-warning text-center">No tienes películas en favoritos.</p>
@else
    <div class="row">
        @foreach($favorites as $favorite)
            <div class="col-md-4 col-lg-3">
                <div class="card bg-secondary text-white mb-4">
                    <img src="https://image.tmdb.org/t/p/w500{{ $favorite->poster }}" class="card-img-top" alt="{{ $favorite->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $favorite->title }}</h5>

                        <form action="{{ route('favoritos.destroy', $favorite->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Quitar de Favoritos
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
