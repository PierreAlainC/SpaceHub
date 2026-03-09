<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlanetService
{
    private HttpClientInterface $client;
    private string $apiKey;

    public function __construct(HttpClientInterface $client, string $solarSystemApiKey)
    {
        $this->client = $client;
        $this->apiKey = $solarSystemApiKey;
    }

    public function fetchPlanets(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.le-systeme-solaire.net/rest/bodies',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]
        );

        $data = $response->toArray();

        return array_filter($data['bodies'], function ($body) {
            return isset($body['isPlanet']) && $body['isPlanet'] === true;
        });
    }
}