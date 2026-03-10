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
}
