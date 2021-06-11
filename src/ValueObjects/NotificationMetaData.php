<?php


namespace App\ValueObjects;


class NotificationMetaData
{
    private string $icon = 'default.ico';
    private bool $isActive;

    public function __construct(string $icon, bool $isActive)
    {
        $this->icon = $icon;
        $this->isActive = $isActive;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }


}