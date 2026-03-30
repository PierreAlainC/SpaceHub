<?php

namespace App\Controller\Api;

use App\Service\ApodService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/apod", name="api_apod_")
 */
class ApodController extends AbstractController
{
    /**
     * Retourne la photo du jour de la NASAA!
     * 
     * @Route("", name="show_apod", methods={"GET"})
     */
    public function show(Request $request, ApodService $apodService): JsonResponse
    {
        try {
            $date = $request->query->get('date');
            $apod = $apodService->fetchApod($date);

            return $this->json($apod);
        } catch (\Throwable $e) {
            return $this->json([
                'error' => 'Impossible d\'obtenir une photo pour le moment' /* $e->getMessage() */,
            ], 500);
        }
    }
}
