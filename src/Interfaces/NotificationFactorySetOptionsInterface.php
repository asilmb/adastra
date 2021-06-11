<?php


namespace App\Interfaces;


use App\NotificationManager;
use App\Services\DeviceCountryCodeServiceInterface;
use App\Services\DeviceRepositoryInterface;
use App\ValueObjects\CountryIso;

interface NotificationFactorySetOptionsInterface
{

    public function setNotificationClient(NotificationClientInterface $client);

    public function defineServiceByDeviceRepoAndCountryIso(DeviceRepositoryInterface $deviceRepository, CountryIso $countryIso);

}