<?php


namespace App\Service;


use Symfony\Component\DependencyInjection\Loader\Configurator\ServiceConfigurator;

class MessageService
{
    public function happyMessage()
    {
        return 'hi i"m happy very';
    }
}