<?php

declare(strict_types=1);

namespace App\Bundle\OlxBundle\Provider\ItemCollection;

use App\Bundle\OlxBundle\Item\Item;
use Symfony\Component\DomCrawler\Crawler;

class OlxItemCollectionProvider implements OlxItemCollectionProviderInterface
{
    public function provide(string $content): array
    {
        $crawler = new Crawler($content);

        $crawler = $crawler
            ->filter('.offer-wrapper')
            ->each(function (Crawler $node, $i) {
                return $this->getElements($node);
            });

        return $crawler;
    }

    private function getElements(Crawler $node): Item
    {
        $photo = '';
        $city = $node->filter('.bottom-cell')->filter('.lheight16')->filter('small')->first()->text();
        $date = $node->filter('.bottom-cell')->filter('.lheight16')->filter('small')->last()->text();

        if (isset($node->filter('.photo-cell')->filter('a > img')->first()->extract(['src'])[0])){
            $photo = $node->filter('.photo-cell')->filter('a > img')->first()->extract(['src'])[0];
        }

        $name = $node->filter('.title-cell')->filter('.space')->filter('h3')->first()->text();
        $url = $node->filter('.title-cell')->filter('.space')->filter('a')->first()->link()->getUri();
        $price = intval(str_replace(' ', '', $node->filter('.price')->first()->text()));

        return new Item($name, $url, $city, $date, $price, $photo);
    }
}
