<?php


namespace AppTests\Assets;


use App\NotificationManager;
use App\ValueObjects\NotificationMetaData;

class MetaDataAssets
{
    public static function getMetaData(): NotificationMetaData
    {
        return new NotificationMetaData("example.icon", true);
    }
}