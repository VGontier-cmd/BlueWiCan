<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendData implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $id;
    public string $trame;
    public string $sizeTrame;
    public string $date;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $id, string $trame, string $sizeTrame, string $date)
    {
        $this->id = $id;
        $this->trame = $trame;
        $this->sizeTrame = $sizeTrame;
        $this->date = $date;
    }

    public function broadcastWith() {
        return [
            "id" => $this->id,
            "trame" => $this->trame,
            "sizeTrame" => $this->sizeTrame,
            "date" => $this->date
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        print("broadcastOn");
        return new Channel("SendDataEvent");
    }
}
