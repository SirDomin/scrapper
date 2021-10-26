<?php

namespace App\Bundle\OlxBundle\Item;

class Item
{
    private string $name;
    private string $url;
    private string $city;
    private string $time;
    private int $price;
    private string $photoUrl;

    /**
     * Item constructor.
     * @param string $name
     * @param string $url
     * @param string $city
     * @param string $time
     * @param int $price
     * @param string $photoUrl
     */
    public function __construct(string $name, string $url, string $city, string $time, int $price, string $photoUrl)
    {
        $this->name = $name;
        $this->url = $url;
        $this->city = $city;
        $this->time = $time;
        $this->price = $price;
        $this->photoUrl = $photoUrl;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photoUrl;
    }

    /**
     * @param string $photoUrl
     */
    public function setPhotoUrl(string $photoUrl): void
    {
        $this->photoUrl = $photoUrl;
    }
}
