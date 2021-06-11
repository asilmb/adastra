<?php


namespace App\Interfaces;


interface NotificationClientInterface
{
    /**
     * @param  $payload
     * @return bool
     */
    public function send($payload): bool;

}