<?php


namespace App\Symfony\Repository;


use App\Services\DeviceRepositoryInterface;
use App\Symfony\Models\Device;

class DeviceRepository implements DeviceRepositoryInterface
{
    public function all($countryCode): array
    {
        return Device::whereCountryCode($countryCode)->get();
    }

    public function oneByUserId($countryCode, int $id): array
    {
        return Device::whereCountryCode($countryCode)->whereUserId($id)->get();
    }
}