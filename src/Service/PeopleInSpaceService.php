<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PeopleInSpaceService
{
    private HttpClientInterface $client;
    private string $apiUrl;

    public function __construct(HttpClientInterface $client, string $peopleInSpaceApiUrl)
    {
        $this->client = $client;
        $this->apiUrl = $peopleInSpaceApiUrl;
    }

    public function fetchPeopleInSpace(): array
    {
        $response = $this->client->request(
            'GET',
            $this->apiUrl . '/astros.json'
        );

        $data = $response->toArray();

        return [
            'message' => $data['message'] ?? null,
            'number' => $data['number'] ?? 0,
            'people' => $data['people'] ?? [],
        ];
    }
}