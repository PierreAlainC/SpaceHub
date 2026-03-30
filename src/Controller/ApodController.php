<?php

namespace App\Controller;

use App\Service\ApodService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApodController extends AbstractController
{
    /**
     * @Route("/apod", name="apod_show", methods={"GET"})
     */
    public function show(Request $request, ApodService $apodService): Response
    {
        $date = $request->query->get('date');
        $apod = $apodService->fetchApod($date);

        return $this->render('apod/show.html.twig', [
            'apod' => $apod,
        ]);
    }
}