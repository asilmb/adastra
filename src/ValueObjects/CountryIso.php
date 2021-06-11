<?php


namespace App\ValueObjects;


class CountryIso
{
    private string $code;
    private string $country;

    public function __construct(string $country, string $code)
    {
        $this->country = $country;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}