<?php

namespace App\Handlers;

use App\Events\SendData;
use Ratchet\ConnectionInterface;
use BeyondCode\LaravelWebSockets\Apps\App;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class CustomWebSocketHandler implements MessageComponentInterface
{

    public function onOpen(ConnectionInterface $connection)
    {
        dump('on opened');
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;
        $connection->app = App::findById('staging');
        echo sprintf("[server] %s connected.\n", spl_object_hash($connection));
    }
    
    public function onClose(ConnectionInterface $connection)
    {
        dump('on closed');
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        dump('on error');
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        dump('on message');
        SendData::createEvent($msg);
    }
}