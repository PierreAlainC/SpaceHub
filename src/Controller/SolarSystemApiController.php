<?php

namespace App\Controller;

use App\Service\SolarSystemApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SolarSystemApiController extends AbstractController
{
    /**
     * @Route("display-infos-api", name="display_infos_api")
     */
    public function displayInfosApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $data = $solarSystemApiService->displayInfos();

        dd($data);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-all-data-api", name="display_all_data_api")
     */
    public function displayAllDataApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $data = $solarSystemApiService->displayAllData();

        dd($data);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-all-bodies-api", name="display_all_bodies_api")
     */
    public function displayAllBodiesApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->displayAllBodies();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-details-bodies-api", name="display_details_bodies_api")
     */
    public function displayDetailsBodiesApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->displayAllBodies();

        dump($bodies[76]);
        dump($bodies[510]);
        dd($bodies[3]);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-moons-api", name="display_moons_api")
     */
    public function displayMoonsApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->fetchMoons();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-asteroids-api", name="display_asteroids_api")
     */
    public function displayAsteroidsApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->fetchAsteroids();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-dwarf-planets-api", name="display_dwarf-planets_api")
     */
    public function displayDwarfPlanetsApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->fetchDwarfPlanets();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-comets-api", name="display_comets_api")
     */
    public function displayCometsApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->fetchComets();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-stars-api", name="display_stars_api")
     */
    public function displayStarsApi(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->fetchStars();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }


    /**
     * @Route("display-all-body-types", name="display_all-body-types")
     */
    public function displayAllBodyTypes(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->displayBodyTypes();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }

    /**
     * @Route("display-all-body-fields", name="display_all-body-fields")
     */
    public function displayAllBodyFields(SolarSystemApiService $solarSystemApiService): Response
    {
        $bodies = $solarSystemApiService->displayBodyFields();

        dd($bodies);
        /* return $this->render('$0.html.twig', []); */
    }

}
