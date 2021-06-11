<?php


namespace App\Interfaces;


use App\NotificationManager;
use App\Services\DeviceCountryCodeServiceInterface;
use App\ValueObjects\CountryIso;

interface NotificationFactoryInterface
{

    public function getNotificationFactory(): NotificationManager;
}