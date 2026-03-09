<?php

namespace App\Controller;

use App\Repository\PlanetRepository;
use App\Service\PlanetService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanetController extends AbstractController
{
    /**
     * @Route("/planets", name="planets_list")
     */
    public function index(PlanetRepository $planetRepository): Response
    {
        $planets = $planetRepository->findAll();

        return $this->render('planet/index.html.twig', [
            'planets' => $planets,
        ]);
    }

    /**
     * @Route("/planets/{slug}", name="planet_show")
     */
    public function show(string $slug, PlanetRepository $planetRepository): Response
    {
        $planet = $planetRepository->findOneBy(['slug' => $slug]);

        if (!$planet) {
            throw $this->createNotFoundException('La planète en question n\'a pas été trouvé');
        }

        return $this->render('planet/show.html.twig', [
            'planet' => $planet,
        ]);
    }

    /**
     * @Route("test-planets-api", name="test_planets_api")
     * Ceci n'est qu'un fonction test permettant d'afficher dans un tableau simplement les données récupérées par notre service PlanetService.php
     */
    public function testApi(PlanetService $planetService): Response
    {
        $data = $planetService->fetchPlanets();

        dd($data);
    }
}
