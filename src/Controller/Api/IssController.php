<?php

namespace App\Controller\Api;

use App\Service\IssService;
use App\Service\IssLocationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("api/v1/iss", name="api_iss") 
*/
class IssController extends AbstractController
{
    /**
     * @Route("", name="show", methods={"GET"})
     */
    public function show(IssService $issService): JsonResponse
    {
        try {
            return $this->json($issService->fetchCurrentIssPosition());
        } catch (\Throwable $e) {
            return $this->json([
                /* $e->getMessage() */ 'error' => 'Il est impossible de récupérer la position de l\'ISS pour le moment, You can\'t catch me they say!',
            ], 500);
        }
    }

    /**
     * @Route("above", name="Above")
     */
    public function FunctionName(): JsonResponse
    {
        dd($issLocationService->getAllNominatimFields(
            $iss['latitude'],
            $iss['longitude']
        ));
    }
}
