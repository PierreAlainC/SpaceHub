<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class IssLocationService
{
    private HttpClientInterface $client;
    private string $apiUrl;

    public function __construct(HttpClientInterface $client, string $nominatimApiUrl)
    {
        $this->client = $client;
        $this->apiUrl = $nominatimApiUrl;
    }

    public function reverseGeo(?float $latitude, ?float $longitude): array
    {
        if ($latitude === null || $longitude === null){
            return [
                'display_name' => null,
                'country' => null,
                'region' => null,
                'city' => null,
                'state' => null,
                'county' => null,
                'body_of_water' => null,
            ];
        }

        $response = $this->client->request(
            'GET',
            $this->apiUrl . '/reverse',
            [
                'query' => [
                    'lat' => $latitude,
                    'lon' => $longitude,
                    'format' => 'jsonv2',
                    'zoom' => 5,
                    'addressdetails' => 1,
                ],
                'headers' => [
                    'User-Agent' => 'SpaceHub, a Symfony project',
                    'Accept-Language' => 'fr',
                ],
            ],
        );

        $data = $response->toArray(false);
        $address = $data['address'] ?? [];

        $bodyOfWater = null;

        if (isset($address['ocean'])) {
            $bodyOfWater = $address['ocean'];
        } elseif (isset($address['sea'])) {
            $bodyOfWater = $address['sea'];
        } elseif (isset($address['water'])) {
            $bodyOfWater = $address['water'];
        }

        return [
            'display_name' => $data['display_name'] ?? null,
            'country' => $address['country'] ?? null,
            'region' => $address['region'] ?? null,
            'state' => $address['state'] ?? null,
            'county' => $address['county'] ?? null,
            'city' => $address['city'] ?? $address['town'] ?? $address['village'] ?? null,
            'body_of_water' => $bodyOfWater,
        ];
    }

    public function specifyIssArea(array $location): string
    {
        if (!empty($location['body_of_water'])) {
            return 'Au-dessus de ' . $location['body_of_water'];
        }

        if (!empty($location['city']) && !empty($location['country'])) {
            return 'Au-dessus de ' . $location['city'] . ', ' . $location['country'];
        }

        if (!empty($location['state']) && !empty($location['country'])) {
            return 'Au-dessus de ' . $location['state'] . ', ' . $location['country'];
        }

        if (!empty($location['country'])) {
            return 'Au-dessus de ' . $location['country'];
        }

        if (!empty($location['display_name'])) {
            return 'Zone proche : ' . $location['display_name'];
        }

        return 'Zone de survol indisponible pour le moment, L\'ISS est très certainement au-dessus de l\'eau et nous guettons son retour au dessus de la terre ferme!';
    }
}