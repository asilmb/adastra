<?php

namespace App;

use App\Interfaces\NotificationClientInterface;
use App\Services\DeviceCountryCodeServiceInterface;
use App\ValueObjects\Notification;
use App\ValueObjects\NotificationMetaData;

class NotificationManager
{

    private NotificationClientInterface $client;
    private DeviceCountryCodeServiceInterface $deviceCountryCodeService;

    public function __construct(NotificationClientInterface $client, DeviceCountryCodeServiceInterface $deviceCountryCodeService)
    {
        $this->client = $client;
        $this->deviceCountryCodeService = $deviceCountryCodeService;
    }

    public function notifyAllUsers(string $text, NotificationMetaData $metadata = null): bool
    {
        if ($this->isReadyToSend($text)) {
            return $this->send(new Notification($this->deviceCountryCodeService->all(), $text, $metadata));
        }
        return false;
    }

    public function notifyUser(int $userId, string $text, NotificationMetaData $metadata = null): bool
    {
        if ($this->isReadyToSend($text)) {
            return $this->send(new Notification($this->deviceCountryCodeService->oneByUserId($userId), $text, $metadata));
        }
        return false;
    }

    private function isReadyToSend(string $text): bool
    {
        return !empty($text);
    }

    private function send(Notification $notification)
    {
        $notification->updateMetadataDeviceActiveStatus();
        $messages = $notification->getMessagesReadyToSend();
        foreach ($messages as $payload) {
            $this->client->send($payload);
        }

        if (count($messages) > 0) {
            return true;
        } else {
            return false;
        }
    }
}