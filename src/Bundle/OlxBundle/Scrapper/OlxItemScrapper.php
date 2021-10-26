<?php

namespace App\Bundle\OlxBundle\Scrapper;

use App\Bundle\OlxBundle\Provider\ItemCollection\OlxItemCollectionProviderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class OlxItemScrapper
{
    private HttpClientInterface $httpClient;
    private OlxItemCollectionProviderInterface $olxItemCollectionProvider;

    public function __construct(HttpClientInterface $httpClient, OlxItemCollectionProviderInterface $olxItemCollectionProvider)
    {
        $this->httpClient = $httpClient;
        $this->olxItemCollectionProvider = $olxItemCollectionProvider;
    }

    public function getNewestItems(string $parsedUrl): array
    {
        $response = $this->httpClient->request('GET', $parsedUrl);

        return $this->olxItemCollectionProvider->provide($response->getContent());
    }
}
