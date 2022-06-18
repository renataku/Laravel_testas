<?php

namespace App\Events;

use App\Models\News;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use DateTime;

class NewsViewed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var News */
    public $news;

    /** @var DateTime */
    public $viewedAt;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(News $news, DateTime $viewedAt)
    {
        $this->news = $news;
        $this->viewedAt = $viewedAt;
    }
}
