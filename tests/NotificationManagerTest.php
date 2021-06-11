<?php

namespace AppTests;

use AppTests\Assets\MetaDataAssets;
use PHPUnit\Framework\TestCase;

class NotificationManagerTest extends TestCase
{
    private $textExample = 'Lorem Ipsum';

    private $exampleUserId = 1;

    private function getNotifictionManager()
    {
        $notificationFactory = new MockNotificationFactory();
        return $notificationFactory->getNotificationFactory();
    }

    public function testNotifyAllUsers()
    {
        $notificationManager = $this->getNotifictionManager();
        $result = $notificationManager->notifyAllUsers($this->textExample, MetaDataAssets::getMetaData());
        $this->assertTrue($result);
    }

    public function testNotifyAllUsersNullMetaData()
    {
        $notificationManager = $this->getNotifictionManager();
        $result = $notificationManager->notifyAllUsers($this->textExample);
        $this->assertTrue($result);
    }

    public function testNotifyUser()
    {
        $notificationManager = $this->getNotifictionManager();
        $result = $notificationManager->notifyUser($this->exampleUserId, $this->textExample, MetaDataAssets::getMetaData());
        $this->assertTrue($result);
    }

    public function testNotifyUserNullMetaData()
    {
        $notificationManager = $this->getNotifictionManager();
        $result = $notificationManager->notifyUser($this->exampleUserId, $this->textExample);
        $this->assertTrue($result);
    }
}
