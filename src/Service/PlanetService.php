<?php

namespace App\Service;

use App\Entity\Planet;
use App\Repository\PlanetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PlanetService
{
    private HttpClientInterface $client;
    private string $apiKey;
    private PlanetRepository $planetRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        HttpClientInterface $client, string $solarSystemApiKey, PlanetRepository $planetRepository, EntityManagerInterface $entityManager) 
    {
        $this->client = $client;
        $this->apiKey = $solarSystemApiKey;
        $this->planetRepository = $planetRepository;
        $this->entityManager = $entityManager;
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

    public function updatePlanetsFromApi(): void
    {
        $apiPlanets = $this->fetchPlanets();

        foreach ($apiPlanets as $apiPlanet) {
            $planet = $this->planetRepository->findOneBy([
                'slug' => strtolower($apiPlanet['englishName'])
            ]);

            if (!$planet) {
                continue;
            }

            $planet->setEnglishName($apiPlanet['englishName'] ?? null);
            $planet->setMass(
                isset($apiPlanet['mass']['massValue'], $apiPlanet['mass']['massExponent'])
                    ? $apiPlanet['mass']['massValue'] * pow(10, $apiPlanet['mass']['massExponent'])
                    : null
            );
            $planet->setDiameter($apiPlanet['meanRadius'] ?? null);
            $planet->setGravity($apiPlanet['gravity'] ?? null);
            $planet->setDensity($apiPlanet['density'] ?? null);
            $planet->setMeanTemperature($apiPlanet['avgTemp'] ?? null);
            $planet->setSemimajorAxis($apiPlanet['semimajorAxis'] ?? null);
            $planet->setOrbitalPeriod($apiPlanet['sideralOrbit'] ?? null);
            $planet->setOrbitalSpeed(null);
            $planet->setMoonsCount(isset($apiPlanet['moons']) ? count($apiPlanet['moons']) : 0);
            $planet->setDiscoveredBy($apiPlanet['discoveredBy'] ?? null);
            $planet->setDiscoveredDate($apiPlanet['discoveryDate'] ?? null);
            $planet->setUpdatedAt(new \DateTimeImmutable());
        }

        $this->entityManager->flush();
    }
}