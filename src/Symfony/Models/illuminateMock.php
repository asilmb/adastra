<?php

namespace App\Symfony\Models;

class illuminateMock
{
    private array $devices;
    private int $userId;

    public function __construct()
    {
        $this->devices = [
            1 => new Device('Disable'),
            2 => new Device(),
            3 => new Device('Disable'),
        ];
    }

    public function whereUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function get(): array
    {
        if($this->userId) {
            return [$this->devices[$this->userId]];
        }
        return $this->devices;
    }
}