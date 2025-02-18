<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = '78b4086b01c4d60b1e4e8a8332675910'; // APIKey
        $searchTerm = $request->query('search'); // Obtiene el término de búsqueda desde la URL
        //request es un objeto de la clase Illuminate lo que hace es representar la solicitud actual http
        //Contiene los datos enviados desde el navegador. Como parametros de la url

        // Parámetros de la solicitud,con las variable de la array me permite el acceso de los datos
        $params = [
            'api_key' => $apiKey,
            'language' => 'es-ES',
        ];

        if ($searchTerm) {
            // Si hay un término de búsqueda, buscamos las películas
            $params['query'] = $searchTerm;
            $response = Http::get("https://api.themoviedb.org/3/search/movie", $params);
        } else {
            // Si no hay término de búsqueda, mostramos las películas populares
            $response = Http::get("https://api.themoviedb.org/3/movie/popular", $params);
        }

        // Comprobamos si la respuesta es exitosa y devolvemos los datos a la vista
        if ($response->successful()) {
            return view('movies.index', [
                'movies' => $response->json()['results'], // Pasamos las películas
                'searchTerm' => $searchTerm, // Pasamos el término de búsqueda y me devuelve la lista de la busqueda
            ]);
        } else {
            return view('movies.index', ['error' => 'No se pudieron cargar las películas']);
        }
    }
    // Función para obtener los detalles de una película
    public function show($id)
    {
        $apiKey = '78b4086b01c4d60b1e4e8a8332675910'; // APIKey

        // Hacemos la solicitud para obtener los detalles de la película
        $response = Http::get("https://api.themoviedb.org/3/movie/{$id}", [
            'api_key' => $apiKey,
            'language' => 'es-ES',
        ]);

        //Si la busqueda es exitosa hace que la respuesta envie los datos a la vista
        if ($response->successful()) {
            return view('movies.show', ['movie' => $response->json()]);
        } else {
            return view('movies.show', ['error' => 'No se pudo obtener información de la película']);
        }
    }
}
