<?php

declare(strict_types=1);

namespace App\Bundle\OlxBundle\Provider\ItemCollection;

use Symfony\Component\DomCrawler\Crawler;

class OlxItemCollectionProvider implements OlxItemCollectionProviderInterface
{
    public function provide(string $content): array
    {
        $crawler = new Crawler($content);

        $crawler = $crawler
            ->filter('body > #offers_table')
            ->reduce(function (Crawler $node, $i) {
                // filters every other node
                return ($i % 2) == 0;
            });


        dd($crawler);
        $items = $crawler->filter('#offer-wrapper')->first()->text();

        dd($items);

        return [];
    }
}
