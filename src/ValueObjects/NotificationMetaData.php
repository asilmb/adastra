<?php


namespace App\ValueObjects;


class NotificationMetaData
{
    private string $icon;
    private bool $isActive;

    public function __construct(bool $isActive, string $icon = 'default.ico')
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