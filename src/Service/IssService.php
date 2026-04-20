<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class IssService
{
    private HttpClientInterface $client;
    private string $apiUrl;

    public function __construct(HttpClientInterface $client, string $issApiUrl)
    {
        $this->client = $client;
        $this->apiUrl = $issApiUrl;
    }

    public function fetchCurrentIssPosition(): array
    {           
        // satellites/[id]
        // Returns position, velocity, and other related information about a satellite 
        // for a given point in time. 
        // [id] is required and should be the NORAD catalog id. 
        // For the ISS, that id is 25544.
        // -> https://wheretheiss.at/w/developer
        $response = $this->client->request(
            'GET',
            $this->apiUrl . '/satellites/25544',
            [
                'timeout' => 20
            ],
        );

        $data = $response->toArray();

        return [
            'name' => $data['name'] ?? null,
            'id' => $data['id'] ?? null,
            'latitude' => $data['latitude'] ?? null,
            'longitude' => $data['longitude'] ?? null,
            'altitude' => $data['altitude'] ?? null,
            'velocity' => $data['velocity'] ?? null,
            'visibility' => $data['visibility'] ?? null,
            'footprint' => $data['footprint'] ?? null,
            'timestamp' => $data['timestamp'] ?? null,
            'daynum' => $data['daynum'] ?? null,
            'solar_lat' => $data['solar_lat'] ?? null,
            'solar_lon' => $data['solar_lon'] ?? null,
            'units' => $data['units'] ?? null,            
        ];
    }
}