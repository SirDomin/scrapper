<?php

namespace App\Bundle\OlxBundle\Provider;

class Olx
{
    private string $url = 'https://www.olx.pl';
    private string $category = '';
    private string $subCategory = '';
    private string $make = '';
    private string $city = '';
    private int $minPrice = 0;
    private int $maxPrice = 0;

    public function __construct()
    {
        // default
        $this->setCategory('motoryzacja');
        $this->setSubCategory('samochody');
        $this->setMake('opel');
        $this->setCity('brodnica');
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function setSubCategory(string $subCategory): void
    {
        $this->subCategory = $subCategory;
    }

    public function setMake(string $make): void
    {
        $this->make = $make;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setMinPrice(int $minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    public function setMaxPrice(int $maxPrice): void
    {
        $this->maxPrice = $maxPrice;
    }

    public function getUrl(): string
    {
        return $this->url  . $this->parsePath() . str_replace('%26', '&', str_replace('%3D', '=', $this->getFilters()));
    }

    private function getFilters(): string
    {
        return
            urlencode(
                sprintf('search[filter_float_price:from]=%d', $this->minPrice) .
                sprintf('&search[filter_float_price:to]=%d', $this->maxPrice)
            )
        ;
    }

    private function parsePath(): string
    {
        $path = '/';

        if ($this->category !== null) {
            $path = $path . $this->category . '/';
        }

        if ($this->subCategory !== null) {
            $path = $path . $this->subCategory . '/';
        }

        if ($this->make !== null) {
            $path = $path . $this->make . '/';
        }

        if ($this->city !== null) {
            $path = $path . $this->city . '/';
        }

        return $path . '?';
    }
}
