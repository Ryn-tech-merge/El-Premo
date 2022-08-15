<?php

namespace App\Events;

use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class chat implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $orderId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($orderId)
    {
        // $this->fId = $fId;
        // $this->uId = $uId;
        // $this->message = $message;
        $this->orderId = $orderId;
        // $this->status = $status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('chat'.(string)$this->orderId);
    }
    // public function broadcastWith(){
        
    //     return ['user_id'=>$this->uId,'free_id'=>$this->fId,
    // 'message'=>$this->message,'status'=>$this->status,
    // ];
    //     //dd(['name'=>'hamza123','id'=>'1']);
    // }
    // public function broadcastAs(){
    //     return 's-chat';
    // }
}
