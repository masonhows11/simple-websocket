<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PostCreate implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Post $post;
    /**
     * Create a new event instance.
     */
    public function __construct(Post $post)
    {
        //
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        //        return [
        //            new Channel('posts'),
        //        ];
        return new Channel('postsCreated');
    }

//    /**
//     * Write code on Method
//     *
//     * @return response()
//     */
//    public function broadcastAs(): string|response
//    {
//        return 'create';
//    }


    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'message' => "[{$this->post->created_at}] New Post Received with title '{$this->post->title}'."
        ];
    }
}
