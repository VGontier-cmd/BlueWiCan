<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Pusher\Pusher;
use Illuminate\Http\Request;

class SocketsController {

    public function connect(Request $request) {
        $broacaster = new PusherBroadcaster(
            new Pusher(
                config("broadcasting.connections.pusher.key"),
                config("broadcasting.connections.pusher.secret"),
                config("broadcasting.connections.pusher.app_id")
                []
            )
        );
        return $broacaster->validAuthenticationResponse($request, []);
    }
}