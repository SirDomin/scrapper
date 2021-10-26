<?php

declare(strict_types=1);

namespace App\Controller;

use App\Bundle\OlxBundle\Provider\Olx;
use App\Bundle\OlxBundle\Scrapper\OlxItemScrapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends AbstractController
{
    private Olx $olx;
    private OlxItemScrapper $olxItemScrapper;

    public function __construct(Olx $olx, OlxItemScrapper $olxItemScrapper)
    {
        $this->olx = $olx;
        $this->olxItemScrapper = $olxItemScrapper;
    }

    public function index(): JsonResponse
    {
        $this->olx->setMinPrice(1);
        $this->olx->setMaxPrice(5000);
        $this->olx->setCity('lodz');


        $this->olxItemScrapper->getNewestItems($this->olx->getUrl());
        return new JsonResponse(['url' => $this->olx->getUrl()]);
    }
}
