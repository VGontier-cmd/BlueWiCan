<?php 
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;


//WebSockets Handlers
WebSocketsRouter::webSocket('/', \App\Handlers\CustomWebSocketHandler::class);