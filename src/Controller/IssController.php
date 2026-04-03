<?php

namespace App\Controller;

use App\Service\IssService;
use App\Service\PeopleInSpaceService;
use App\Service\IssLocationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IssController extends AbstractController
{
    /**
     * @Route("/iss", name="iss_show", methods={"GET"})
     */
    public function show(IssService $issService, PeopleInSpaceService $peopleInSpaceService, issLocationService $issLocationService): Response
    {
        

        $iss = $issService->fetchCurrentIssPosition();
        $peopleInSpace = $peopleInSpaceService->fetchPeopleInSpace();
        $issLocation = $issLocationService->reverseGeo($iss['latitude'] ?? null, $iss['longitude'] ?? null);
        $issLocationZone = $issLocationService->specifyIssArea($issLocation);

        return $this->render('iss/show.html.twig', [
            'iss' => $iss,
            'peopleInSpace' => $peopleInSpace,
            'issLocation' => $issLocation,
            'locationZone' => $issLocationZone,
        ]);
    }
}