<?php


namespace App\Services;


use App\Symfony\Models\Device;

interface DeviceRepositoryInterface
{
    public function all($countryCode): array;

    public function oneByUserId($countryCode, int $id): array;
}