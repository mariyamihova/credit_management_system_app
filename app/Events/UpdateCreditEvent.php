<?php

namespace App\Events;

use App\Models\Credit;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateCreditEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected Credit $item;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Credit $item)
    {
        $this->item = $item;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    public function getItem(): Credit
    {
        return $this->item;
    }
}
