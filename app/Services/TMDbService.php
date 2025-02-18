<?php

namespace App\Services;

use GuzzleHttp\Client;

class TMDbService
{
    protected $client;
    protected $baseUri;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUri = config('services.tmdb.base_uri');
        $this->apiKey = config('services.tmdb.api_key');
    }

    public function getPopularMovies()
    {
        $response = $this->client->request('GET', "{$this->baseUri}movie/popular", [
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'es-ES'
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
