<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TranslationService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function translateToFrench(string $text): ?string
    {
        if (empty($text)) {
            return null;
        }

        $response = $this->client->request(
            'POST',
            'https://libretranslate.de/translate',
            [
                'json' => [
                    'q' => $text,
                    'source' => 'en',
                    'target' => 'fr',
                    'format' => 'text',
                ],
            ]
        );

        $content = $response->getContent(false);
        $data = json_decode($content, true);

        return $data['translatedText'] ?? null;
    }
}