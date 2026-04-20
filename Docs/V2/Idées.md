# Idées de features ou fixs pour une V2

## Leaflet

Grâce à la map Leaflet, afficher l'emplacement de l'ISS.

## Correction/Optimisation ISS

Correction/Optimisation de l'emplacement/zone de survol de l'ISS.

Il y a des soucis d'affichage de l'emplacement de la Station Spatiale Internationnale, il arrive que ne récupère pas sa zone de survol, habituellement au dessus de l'eau je suspecte.

## Traduction texte anglais

Nous récupérons des données en anglais, notamment pour les planètes et l'apod.

Il serait bien de pouvoir proposer une traduction de ces texte anglais.

## NavBar

Ben oui pardi! Peaufiner un peu tout ça?

On a fait une navbar scrumb pour le moment.

## Correction Planets

Il y'a de petites erreurs qui se sont glissées dans les données des planètes, comme par exemple Mercure qui a une température moyenne fausse.

## Optimisation page ISS

Temps de réponse trop long. Voir pour optimiser ce temps de réponse avec peut être une synchronisation en BDD comme pour les données Planètes?

## Traduction

On va plutôt passer avec `Microsoft` pour la traduction car je n'arrive pas à solutionner avec `libretranslate`

-> Créer un compte gratuitement
-> Suivre Insttructions :
https://learn.microsoft.com/fr-fr/azure/ai-services/translator/text-translation/how-to/use-rest-api?tabs=csharp

-----------------------------------------

Le service REST officiel demande :

un endpoint Azure Translator,
une clé d’authentification dans l’en-tête Ocp-Apim-Subscription-Key,
et, selon la configuration, souvent aussi Ocp-Apim-Subscription-Region.
La traduction se fait via l’endpoint REST .../translate?api-version=3.0&to=fr, avec un body JSON sous forme de tableau. Microsoft indique aussi qu’il existe bien un free tier F0, non expirant, avec une seule ressource gratuite par abonnement Azure.
Ce qu’il faut ajouter dans .env.local
MICROSOFT_TRANSLATOR_KEY=ta_cle
MICROSOFT_TRANSLATOR_REGION=francecentral
MICROSOFT_TRANSLATOR_ENDPOINT=https://api.cognitive.microsofttranslator.com

Le endpoint global https://api.cognitive.microsofttranslator.com est celui utilisé par la doc REST, et la région doit correspondre à celle de ta ressource Translator.

config/services.yaml

Ajoute :

parameters:
    microsoftTranslatorKey: '%env(MICROSOFT_TRANSLATOR_KEY)%'
    microsoftTranslatorRegion: '%env(MICROSOFT_TRANSLATOR_REGION)%'
    microsoftTranslatorEndpoint: '%env(MICROSOFT_TRANSLATOR_ENDPOINT)%'

services:
    App\Service\TranslationService:
        arguments:
            $translatorKey: '%microsoftTranslatorKey%'
            $translatorRegion: '%microsoftTranslatorRegion%'
            $translatorEndpoint: '%microsoftTranslatorEndpoint%'
src/Service/TranslationService.php
<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TranslationService
{
    private HttpClientInterface $client;
    private string $translatorKey;
    private string $translatorRegion;
    private string $translatorEndpoint;

    public function __construct(
        HttpClientInterface $client,
        string $translatorKey,
        string $translatorRegion,
        string $translatorEndpoint
    ) {
        $this->client = $client;
        $this->translatorKey = $translatorKey;
        $this->translatorRegion = $translatorRegion;
        $this->translatorEndpoint = rtrim($translatorEndpoint, '/');
    }

    public function translateToFrench(string $text): ?string
    {
        if (trim($text) === '') {
            return null;
        }

        $response = $this->client->request(
            'POST',
            $this->translatorEndpoint . '/translate',
            [
                'query' => [
                    'api-version' => '3.0',
                    'from' => 'en',
                    'to' => 'fr',
                ],
                'headers' => [
                    'Ocp-Apim-Subscription-Key' => $this->translatorKey,
                    'Ocp-Apim-Subscription-Region' => $this->translatorRegion,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    [
                        'text' => $text,
                    ],
                ],
            ]
        );

        $content = $response->getContent(false);
        $data = json_decode($content, true);

        if (!is_array($data) || isset($data['error'])) {
            return null;
        }

        return $data[0]['translations'][0]['text'] ?? null;
    }
}
Ce que renvoie l’API

La réponse est un tableau JSON ; pour une seule entrée, on récupère généralement la traduction ici :

$data[0]['translations'][0]['text']

C’est cohérent avec les exemples REST officiels de Microsoft pour Text Translation v3.0.

Exemple d’utilisation dans ton controller APOD
public function show(
    Request $request,
    ApodService $apodService,
    TranslationService $translationService
): Response {
    $date = $request->query->get('date');
    $translate = $request->query->get('translate') === '1';

    $apod = $apodService->fetchApod($date);
    $translatedExplanation = null;

    if (!$apod['error'] && $translate && !empty($apod['explanation'])) {
        $translatedExplanation = $translationService->translateToFrench($apod['explanation']);
    }

    return $this->render('apod/show.html.twig', [
        'apod' => $apod,
        'translatedExplanation' => $translatedExplanation,
    ]);
}
Petit point pratique

Si jamais ta ressource Azure n’exige pas la région, ce header peut parfois sembler superflu, mais la doc officielle le prévoit explicitement pour l’authentification des requêtes Translator

------------------------------------