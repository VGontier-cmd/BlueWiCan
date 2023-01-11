<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Pusher\Pusher;
use Illuminate\Http\Request;

class SocketsController {

    public function connect(Request $request) {
        dd("good")
    }
}