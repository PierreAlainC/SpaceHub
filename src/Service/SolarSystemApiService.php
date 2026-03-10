<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class SolarSystemApiService
{
    private HttpClientInterface $client;
    private string $apiKey;
    private string $apiUrl;

    public function __construct(
        HttpClientInterface $client, string $solarSystemApiKey, string $solarSystemApiUrl) 
    {
        $this->client = $client;
        $this->apiKey = $solarSystemApiKey;
        $this->apiUrl = $solarSystemApiUrl;
    }

    public function displayInfos(): array
    {
        $response = $this->client->request(
            'GET',
            $this->apiUrl,
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]
        );

        return $response->toArray();
    }

        public function displayAllData(): array
    {
        $response = $this->client->request(
            'GET',
            $this->apiUrl . '/bodies',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]
        );

        return $response->toArray();
    }

    public function displayAllBodies(): array
    {
        $response = $this->client->request(
            'GET',
            $this->apiUrl . '/bodies',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]
        );

        $data = $response->toArray();

        return $data['bodies'];
    }

    public function fetchMoons(): array
    {
        $response = $this->client->request(
            'GET',
            $this->apiUrl . '/bodies',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]
        );

        $data = $response->toArray();

        return array_filter($data['bodies'], function ($body) {
            return isset($body['bodyType']) && $body['bodyType'] === 'Moon';
        });
    }
}