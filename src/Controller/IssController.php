<?php

namespace App\Controller;

use App\Service\IssService;
use App\Service\PeopleInSpaceService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IssController extends AbstractController
{
    /**
     * @Route("/iss", name="iss_show", methods={"GET"})
     */
    public function show(IssService $issService, PeopleInSpaceService $peopleInSpaceService): Response
    {

        $iss = $issService->fetchCurrentIssPosition();
        $peopleInSpace = $peopleInSpaceService->fetchPeopleInSpace();

        return $this->render('iss/show.html.twig', [
            'iss' => $iss,
            'peopleInSpace' => $peopleInSpace,
        ]);
    }
}
