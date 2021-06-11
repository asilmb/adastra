<?php


namespace AppTests;


use App\Interfaces\NotificationFactoryInterface;
use App\NotificationManager;
use App\Services\DeviceCountryCodeService;
use App\Symfony\Repository\DeviceRepository;
use AppTests\Assets\CountryAssets;

class MockNotificationFactory implements NotificationFactoryInterface
{

    public function getNotificationFactory(): NotificationManager
    {
        $deviceCountryCodeService = new DeviceCountryCodeService(new MockDeviceRepository(), CountryAssets::getCountryIso()->getCode());
        return new NotificationManager(new MockClient(), $deviceCountryCodeService);
    }

}