<?php

namespace App\Bundle\OlxBundle\Scrapper;

use App\Bundle\OlxBundle\Provider\ItemCollection\OlxItemCollectionProviderInterface;
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

        $collection = $this->olxItemCollectionProvider->provide($response->getContent());

        echo $response->getContent();



        return [];
    }
}
