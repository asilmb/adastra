<?php


namespace App\ValueObjects;


class Notification
{
    private array $devices;
    private string $text;
    private ?NotificationMetaData $metaData;
    const NOTIFICATION_DEVICE_STATUS = 'ACTIVE';

    /**
     * Notification constructor.
     * @param array $devices
     * @param string $text
     * @param NotificationMetaData|null $metadata
     */
    public function __construct(array $devices, string $text, NotificationMetaData $metadata = null)
    {
        $this->devices = $devices;
        $this->text = $text;
        $this->metaData = $metadata;
    }

    public function updateMetadataDeviceActiveStatus()
    {
        foreach ($this->devices as $device) {
            if ($device->state != self::NOTIFICATION_DEVICE_STATUS) {
                $isActive = false;
            } else {
                $isActive = true;
            }
            if(isset($this->metaData)){
                $this->metaData = new NotificationMetaData($isActive, $this->metaData->getIcon());
            } else {
                $this->metaData = new NotificationMetaData($isActive);
            }
        }
    }

    /**
     * @return array
     */
    public function getMessagesReadyToSend(): array
    {
        $messages = [];
        foreach ($this->devices as $device) {
            $messages[] = array(
                'message' => $this->text,
                'registration_id' => $device->registration_id,
                'data' => $this->metaData
            );
        }
        return $messages;
    }


}