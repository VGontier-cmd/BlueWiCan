<?php

namespace App\Handlers;

use App\Events\SendData;
use Ratchet\ConnectionInterface;
use BeyondCode\LaravelWebSockets\Apps\App;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use Illuminate\Support\Facades\Log;

class CustomWebSocketHandler implements MessageComponentInterface
{

    public function onOpen(ConnectionInterface $connection)
    {
        Log::alert('WebSocketHandler - custom');
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;
        $connection->app = App::findById('staging');
        Log::alert('WebSocketHandler - custom');
        echo sprintf("[server] %s connected.\n", spl_object_hash($connection));
    }
    
    public function onClose(ConnectionInterface $connection)
    {
        Log::alert("[server] %s disconnected.\n" . spl_object_hash($connection));
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        Log::alert("[error] %s\n". $e->getMessage());
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        Log::alert('WebSocketHandler - onMessage');
        SendData::createEvent($msg);
    }
}