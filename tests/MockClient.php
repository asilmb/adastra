<?php

namespace AppTests;

use App\Interfaces\NotificationClientInterface;

class MockClient implements NotificationClientInterface
{

    public function send($payload): bool
    {
        return true;
    }

}