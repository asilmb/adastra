<?php


namespace App\Symfony;


use App\Interfaces\NotificationClientInterface;
use App\Interfaces\NotificationFactoryInterface;
use App\Interfaces\NotificationFactorySetOptionsInterface;
use App\NotificationManager;
use App\Services\DeviceCountryCodeService;
use App\Services\DeviceRepositoryInterface;
use App\ValueObjects\CountryIso;

class NotificationFactory implements NotificationFactoryInterface, NotificationFactorySetOptionsInterface
{
    private $client;
    private $deviceCountryCodeService;

    public function setNotificationClient(NotificationClientInterface $client)
    {
        $this->client = $client;
    }

    public function defineServiceByDeviceRepoAndCountryIso(DeviceRepositoryInterface $deviceRepository, CountryIso $countryIso)
    {
        $this->setCountryIso($countryIso);
        $this->deviceCountryCodeService = new DeviceCountryCodeService($deviceRepository, $countryIso->getCode());
    }

    private function setCountryIso(CountryIso $countryIso)
    {
        $this->countryIso = $countryIso;
    }

    public function getNotificationFactory(): NotificationManager
    {
        return new NotificationManager($this->client, $this->deviceCountryCodeService);
    }
}