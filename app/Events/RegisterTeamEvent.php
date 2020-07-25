<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RegisterTeamEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $teams;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($teams)
    {
        $this->teams = $teams;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new channel('register-team');
        }

        public function broadcastAs(){
            return 'register-team';
        }
    
}
