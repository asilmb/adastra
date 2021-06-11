<?php


namespace AppTests;


use App\Services\DeviceRepositoryInterface;
use App\Symfony\Models\Device;

class MockDeviceRepository implements DeviceRepositoryInterface
{
    private function mockDevices(): array {
       return  [
            1 => new Device('Disable'),
            2 => new Device(),
            3 => new Device('Disable'),
        ];
    }
    public function all($countryCode): array
    {
        return $this->mockDevices();
    }

    public function oneByUserId($countryCode, int $id): array
    {
        return [$this->mockDevices()[$id]];
    }
}