<?php

namespace App\Handlers;

use App\Events\SendData;
use Ratchet\ConnectionInterface;
use BeyondCode\LaravelWebSockets\Apps\App;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class WebSocketHandler implements MessageComponentInterface
{

    public function onOpen(ConnectionInterface $connection)
    {
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;
        $connection->app = App::findById('staging');
        dd('ouiiiiiiiiiiiiiiiii');
        echo sprintf("[server] %s connected.\n", spl_object_hash($connection));
    }
    
    public function onClose(ConnectionInterface $connection)
    {
        echo sprintf("[server] %s disconnected.\n", spl_object_hash($connection));
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        echo sprintf("[error] %s\n", $e->getMessage());
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        event(SendData::createEvent($msg));
    }
}