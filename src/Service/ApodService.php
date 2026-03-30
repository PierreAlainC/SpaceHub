<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApodService 
{
    private HttpClientInterface $client;
    private string $apiKey;
    private string $apiUrl;

    public function __construct(HttpClientInterface $client, string $nasaApiKey, string $nasaApiUrl)
    {
        $this->client = $client;
        $this->apiKey = $nasaApiKey;
        $this->apiUrl = $nasaApiUrl;        
    }

    /**
     * Fonction qui nous renvoie le tableau des infos Apod
     */
    public function fetchTodayApod(): array
    {
        return $this->fetchApod();
    }

    /**
     * Fonction qui nous récupère les infos Apod Api
     */
    public function fetchApod(?string $date = null): array
    {
        $query = [
            'api_key' => $this->apiKey,
            'thumbs' => 'true',
        ];

        if ($date !== null){
            $query['date'] = $date;
        }

        $response = $this->client->request(
            'GET', $this->apiUrl . '/planetary/apod', ['query' => $query,]
        );

        $data = $response->toArray();
        
        return [
            'title' => $data['title'] ?? null,
            'date' => $data['date'] ?? null,
            'explanation' => $data['explanation'] ?? null,
            'media_type' => $data['media_type'] ?? null,
            'url' => $data['url'] ?? null,
            'hdurl' => $data['hdurl'] ?? null,
            'thumbnail_url' => $data['thumbnail_url'] ?? null,
            'copyright' => $data['copyright'] ?? null,
            'service_version' => $data['service_version'] ?? null,
        ];
    }
}