<?php

namespace App\Controller;

use App\Service\ApodService;
use App\Service\TranslationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApodController extends AbstractController
{
    /**
     * @Route("/apod", name="apod_show", methods={"GET"})
     */
    public function show(Request $request, ApodService $apodService, TranslationService $translationService): Response
    {
        $date = $request->query->get('date');
        $apod = $apodService->fetchApod($date);

        $translatedExplanation = null;

        if ($request->query->get('translate') === '1') {
            $translatedExplanation = $translationService->translateToFrench(
                $apod['explanation'] ?? ''
            );
        }
    

        return $this->render('apod/show.html.twig', [
            'apod' => $apod,
            'translatedExplanation' => $translatedExplanation,
        ]);
    }
}