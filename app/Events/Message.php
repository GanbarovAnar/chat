<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($includeMessage)
    {
        Log::info("Constructor event. Add message:".$includeMessage);
        $this->message = $includeMessage;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn()
    {
        $chat = new Channel('chat');
        /*
         object(Illuminate\Broadcasting\Channel)#680 (1) {
          ["name"]=>
          string(4) "chat"
        }
        */
        Log::info("create channel:". $chat->name);

        return $chat;
    }

}
