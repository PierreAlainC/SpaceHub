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
        $planets = $planetRepository->findBy([], ['orbitalPeriod' => 'ASC']);

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
     * Ceci n'est qu'un fonction test permettant d'afficher dans un tableau simplement les données des planètes récupérées par notre service PlanetService.php 
     */
    public function testApi(PlanetService $planetService): Response
    {
        $data = $planetService->fetchPlanets();

        dd($data);
    }

    /**
     * Synchronisation de la base de données via la route
     * @Route("/test-planets-sync", name="test_planets_sync")
     */
    public function testSync(PlanetService $planetService): Response
    {
        $result = $planetService->updatePlanetsFromApi();

        //3 réponses possibles
        /*
        dd($result);
        return $this->json($result);
        return new Response(
            '<pre>' . print_r($result, true) . '<pre>'
        ); 
        */

        //réponse propre sans json!
        return new Response(
            '<pre>' . print_r($result, true) . '</pre>'
        );
    }
}
