<?php

namespace App\Symfony\Models;

class Device
{
    public $state;
    public $registration_id;

    public function __construct(string $state = 'Active')
    {
        $this->state = $state;
    }

    public static function whereCountryCode($countryCode = null)
    {
        return new illuminateMock();
    }
}