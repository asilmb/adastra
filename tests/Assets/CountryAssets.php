<?php


namespace AppTests\Assets;


use App\NotificationManager;
use App\ValueObjects\CountryIso;
use App\ValueObjects\NotificationMetaData;

class CountryAssets
{
    public static function getCountryIso(): CountryIso
    {
        return new CountryIso("Afghanistan", 'AF');
    }
}