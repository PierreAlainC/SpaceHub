<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlanetService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchPlanets(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.le-systeme-solaire.net/rest'
        );

        return $response->toArray();
    }
}