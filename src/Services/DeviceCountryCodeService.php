<?php


namespace App\Services;

class DeviceCountryCodeService implements  DeviceCountryCodeServiceInterface
{
    private string $countryCode;
    private DeviceRepositoryInterface $deviceRepository;

    public function __construct(DeviceRepositoryInterface $deviceRepository, string $countryCode)
    {
        $this->deviceRepository = $deviceRepository;
        $this->countryCode = $countryCode;
    }

    public function all(): array
    {
        return $this->deviceRepository->all($this->countryCode);
    }

    public function oneByUserId(int $id): array
    {
        return $this->deviceRepository->oneByUserId($this->countryCode, $id);
    }
}