<?php


namespace App\Services;


use App\Symfony\Models\Device;

interface DeviceCountryCodeServiceInterface
{

    public function all(): array;

    public function oneByUserId(int $id): array;
}