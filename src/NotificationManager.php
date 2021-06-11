<?php

namespace App;

use App\Interfaces\NotificationClientInterface;
use App\Services\DeviceCountryCodeServiceInterface;
use App\Symfony\Models\Device;
use App\ValueObjects\CountryIso;
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
        if (isset($text) && !empty($metadata)) {
            $readyToSend = true;
        } else if (isset($text) && empty($metadata) == true) {
            $metadata = array(
                'icon' => 'default.ico',
            );
            $readyToSend = true;
        } else {
            $readyToSend = false;
        }

        if ($readyToSend == false) {
            return false;
        } else {
            $messages = array();
            $devices = $this->deviceCountryCodeService->all();
            foreach ($devices as $device) {
                if ($device->state != 'ACTIVE') {
                    $metadata['is_active'] = false;
                } else {
                    $metadata['is_active'] = true;
                }

                $messages[] = array(
                    'message' => $text,
                    'registration_id' => $device->registration_id,
                    'data' => $metadata
                );
            }
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

    public function notifyUser(int $userId, string $text, NotificationMetaData $metadata = null): bool
    {
        if (isset($text) && !empty($metadata)) {
            $readyToSend = true;
        } else if (isset($text) && empty($metadata) == true) {
            $metadata = array(
                'icon' => 'default.ico',
            );
            $readyToSend = true;
        } else {
            $readyToSend = false;
        }

        if ($readyToSend == false) {
            return false;
        } else {
            $messages = array();
            $devices = $this->deviceCountryCodeService->oneByUserId($userId);
            foreach ($devices as $device) {
                if ($device->state != 'ACTIVE') {
                    $metadata['is_active'] = false;
                } else {
                    $metadata['is_active'] = true;
                }

                $messages[] = array(
                    'message' => $text,
                    'registration_id' => $device->registration_id,
                    'data' => $metadata
                );
            }
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
}